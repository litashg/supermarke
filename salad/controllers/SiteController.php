<?php

namespace app\controllers;


use app\models\AuthAssignment;
use app\models\CareerForm;
use app\models\Category;
use app\models\MainSlider;
use app\models\Product;
use app\models\SaladItems;
use app\models\UserSalad;
use Yii;
use yii\rbac\DbManager;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use kartik\mpdf\Pdf;
use yii\helpers\Url;
use app\models\Images;
use app\models\Page;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'access' => array(
                'class' => \yii\filters\AccessControl::className(),
                'rules' => array(
                    // allow authenticated users
                    array(
                        'allow' => true,
                        'actions' => array('cabinet'),
                        'roles' => array('customer')
                    ),
                    array(
                        'allow' => true,
                        'actions' => array('usercab'),
                        'roles' => array('user')
                    ),
                    array(
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ),
                    array(
                        'actions' => ['url'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ),

                    array(
                        'actions' => ['index', 'careers', 'page', 'captcha', 'view_wine', 'search', 'view_cat', 'view_prod', 'login', 'about', 'contact', 'create-salad', 'virtual', 'save-json-salad', 'mail-user', 'mail-owner', 'create-pdf'],
                        'allow' => true,
                        'roles' => ['?'],
                    ),
                    array(
                        'actions' => ['index', 'careers', 'page', 'captcha', 'view_wine', 'search', 'view_cat', 'view_prod', 'login', 'about', 'contact', 'create-salad', 'virtual', 'save-json-salad', 'mail-user', 'mail-owner', 'create-pdf'],
                        'allow' => true,
                        'roles' => ['@'],
                    ),

                    //deny all - можно не писать, он по умолчанию всё запрещает
                    array(
                        'allow' => false
                    )
                )
            )
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public $cats;

    public function actionIndex()

    {

        // \Yii::$app->response->format = 'json';
        // var_dump($products_array);
        //  $r=new DbManager;
        // $r->init();
        //var_dump($r->getRole());
        //  $test = $r->createRole('customer');
        //  $r->add($test);
        //$r->getRole($name)
        // $r->assign($test, 3);

// CHANGE ALL RELATED PRODUCTS ALIAS
//        $models = Product::find()->all();
//        foreach($models as $prod){
//            $prod->scenario = 'update';
//        if($prod->parent_product){
//            echo 'main '.$prod->alias.'</br>';
//           $rel_prod =  Product::find()->where(['id'=>$prod->parent_product])->one();
//            $prod->alias = $rel_prod->alias;
//            echo 'rel '. $rel_prod->alias.'</br>';
//            $prod->update();
//        }
//
//        }
//
//die;
        // CHANGE ALL RELATED PRODUCTS ALIAS
        $best_prod = Product::find()->limit(8)->where(['is_featured' => 1])->asArray()->all();
        $images = MainSlider::find()->all();
        $model = new ContactForm();
//        if(isset($_SESSION['__captcha/site/captcha'])){
//                 $model->verifyCode = $_SESSION['__captcha/site/captcha'];
//        }
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('index',
            ['model' => $model,
                'best_prod' => $best_prod,
                'images' => $images
            ]);
    }


    public function actionCabinet()
    {
        return $this->render('cabinet');
    }


    public function actionCareers()
    {
        $model = new CareerForm();
        if ($model->load(Yii::$app->request->post())) {
            $email = 'HR@Supermarketers.com ';
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$email => 'SUPER MARKETERS - e-application '])
                ->setSubject('Employment inquiry')->setHtmlBody(
                    'Name:' . $model->name . '
                  </br>  Email:' . $model->email . '
                  </br>  Message:' . $model->message . '
                  </br>  Phone number:' . $model->phone
                )
                ->send();
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('careers', [
                'model' => $model,
            ]);
        }


    }


    public function actionUsercab()
    {
        return $this->render('usercab');
    }


    public function actionSearch()
    {

        $post_array = Yii::$app->request->post();

        $products_array = Product::find()->where('name LIKE :k OR full_desc LIKE :k', ['k' => "%" . $post_array["keyword"] . "%"])->all();
        return $this->render('search', [
            'products_array' => $products_array,
        ]);
    }

    public function actionView_cat($id)
    {
        $model = Category::find()->where(['alias' => $id])->one();
        return $this->render('view_cat', [
            'model' => $model,
        ]);
    }

    public function actionView_prod($id)
    {

        $model = Product::find()->where(['alias' => $id])->one();

        if ($model->parent_product) {
            $model = Product::find()->where(['id' => $model->parent_product])->one();
        }
//if product is clone
        if ($model) {
            $best_prod = $model->getRelProductsModel();
        }
//if product is clone
        $prod_category = Category::find()->where(['id' => $model['cat_id']])->one();
        $model['allergens'] = $model->getAllergensModel();
        $images = Images::find()->where(['prod_id' => $model->id,])->limit(4)->all();


        return $this->render('view_prod', [
            'model' => $model,
            'images' => $images,
            'best_prod' => $best_prod,
            'prod_cat' => $prod_category,
        ]);
    }

    public function actionLogin()
    {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->can('admin')) {
                return $this->redirect(array('category/index'));
            }
            if (Yii::$app->user->can('customer')) {
                return $this->redirect(array('site/cabinet'));
            }
            if (Yii::$app->user->can('user')) {
                return $this->redirect(array('site/usercab'));
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }

    }

    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {

            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionEntry()
    {
        $model = new EntryForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionVirtual()
    {
        $admin_salads = array();
        $admins = AuthAssignment::find()->select('user_id')->where('item_name = :name', [':name' => 'admin'])->asArray()->all();

        foreach ($admins as $admin) {

            $admin_salads[] = UserSalad::find()->where('user_id = :u_id', [':u_id' => $admin['user_id']])->all();
        }

        return $this->render('virtual', ['admin_salads' => $admin_salads]);
    }

    public function actionCreateSalad()
    {
        $request = Yii::$app->request;

        if ($request->get('id')) {
            $un_id = $request->get('id');
            $exist_salad = UserSalad::find()->select(['name', 'ingred'])->where('uniq_id = :u_id', [':u_id' => $un_id])->one();

        } else {
            $exist_salad = 'null';
        }

        $products_array = SaladItems::find()->orderBy(['position' => SORT_ASC])->all();
        $item_alerg = [];
        foreach ($products_array as $item) {
            $item_alerg[$item->id] = $item->getAllergensName();
        }
        $allergens = \yii\helpers\Json::encode($item_alerg);
        $pr_array = \yii\helpers\Json::encode($products_array);

        return $this->render('create-salad',
            ['var' => $pr_array,
                'yii_ingred' => $products_array,
                'allergens' => $allergens,
                'exist_salad' => $exist_salad,
            ]);

    }

    public function actionSaveImg()
    {
        if ($_POST["imgBase64"]) {

            Yii::setAlias('@user_salad', '@web/usersalad/');
            define('UPLOAD_DIR', Yii::$app->basePath . '/web/usersalad/');
            $img = $_POST["imgBase64"];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file_name = uniqid() . '.png';
            $file = UPLOAD_DIR . $file_name;
            $success = file_put_contents($file, $data);
            if ($success) {
                $user_salad = new UserSalad();
                if (isset($_POST['userId'])) {
                    $user_salad->user_id = $_POST['userId'];
                }
                $user_salad->img = $file_name;
                $user_salad->name = $_POST['saladName'];
                $user_salad->save();
            }
            return $user_salad->id;
        } else {
            return false;
        }
    }

    public function actionViewSalad($id)
    {
        $u_salad = UserSalad::find()->where('id = :s_id', [':s_id' => $id])->one();
        return $this->render('view-salad', ['u_salad' => $u_salad]);
    }


    public function actionMailOwner()
    {
        $email = Yii::$app->params['adminEmail'];
        $request = Yii::$app->request;
        $name = 'SUPER MARKETERS';
        if ($_POST['newsSalad']) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$email => 'SUPER MARKETERS'])
                ->setSubject($name)->setHtmlBody('Letter from ' . $name . '<br>' .
                    '<a href="http://new.supermarketers.com/web/site/create-salad/' . $request->post('newsSalad') . '">New salad </a>')
                ->send();
            return true;
        } else {
            return false;
        }
    }

    public function actionMailUser()
    {
        $name = 'SUPER MARKETERS';
        $request = Yii::$app->request;
        if ($request->post('UserMail')) {

            $email = $request->post('UserMail');


            if ($request->post('SaladId')) {


                Yii::$app->mailer->compose()
                    ->setTo($email)
                    ->setFrom([$email => 'SUPER MARKETERS'])
                    ->setSubject($name)->setHtmlBody('Letter from. ' . $name . '<br>' .
                        '<a href="http://new.supermarketers.com/web/site/create-salad/' . $request->post('SaladId') . '">Show fresh salad.  </a>')
                    ->send();

                return true;
            }

            if ($request->post('PageUrl')) {
                Yii::$app->mailer->compose()
                    ->setTo($email)
                    ->setFrom([$email => 'SUPER MARKETERS'])
                    ->setSubject($name)->setHtmlBody('Letter from. ' . $name . '<br>' .
                        'Hi! Visit this <a href="' . $request->post('PageUrl') . '">page.  </a>')
                    ->send();

                return true;

            }


        } else {
            return false;
        }
    }

    public function actionSaveJsonSalad()
    {
        $request = Yii::$app->request;
        if ($request->post('jsonSalad')) {
            $user_salad = new UserSalad();
            if ($request->post('userId')) {
                $user_salad->user_id = $request->post('userId');
            }
            $user_salad->ingred = $request->post('jsonSalad');
            $user_salad->uniq_id = $request->post('uniqId');
            $user_salad->name = $request->post('saladName');
            if ($user_salad->save()) {
            }
            return true;
        } else {
            return false;
        }

    }

    public function actionCreatePdf()
    {
        $request = Yii::$app->request;
        if ($request->get('id')) {
            $un_id = $request->get('id');
            $exist_salad = UserSalad::find()->select(['name', 'ingred'])->where('uniq_id = :u_id', [':u_id' => $un_id])->one();
        } else {
            return $this->redirect(Url::toRoute('site/create-salad'));
        }
        $products_array = SaladItems::find()->all();
        foreach ($products_array as $item) {
            $item_alerg[$item->id] = $item->getAllergensName();
        }
        $content = $this->render('create-pdf',
            [
                'yii_ingred' => $products_array,
                'exist_salad' => $exist_salad,
            ]);

        $pdf = new Pdf([
// set to use core fonts only
            'filename' => 'salad.pdf',
            'mode' => Pdf::MODE_UTF8,
// A4 paper format
            'format' => Pdf::FORMAT_A4,
// portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
// stream to browser inline
            // 'destination' => Pdf::DEST_BROWSER,
            'destination' => Pdf::DEST_DOWNLOAD,
// your html content input
            'content' => $content,
// format content from your own css file if needed or use the
// enhanced bootstrap css built by Krajee for mPDF formatting
            // 'cssFile' => '/web/css/pdf.css',
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/pdf.css',
// any css to be embedded if required
            //'cssInline' => 'body{width:100px!important}',
// set mPDF properties on the fly
            'options' => ['title' => 'USER PDF'],
// call mPDF methods on the fly
            //  'methods' => [
            //       'SetHeader'=>['Krajee Report Header'],
            //      'SetFooter'=>['{PAGENO}'],
            //  ]
        ]);
// return the pdf output as per the destination setting
        return $pdf->render();
    }


    public function actionPage()
    {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $model = Page::find()->where(['alias' => $id])->one();
        if (!$model) {
            return $this->render('view-page', ['page_err' => 'Sorry.No such page.']);
        }
        return $this->render('view-page', ['page' => $model]);
    }


    public function actionUrl()
    {
        $uploadedFile = UploadedFile::getInstanceByName('upload');
        $mime = \yii\helpers\FileHelper::getMimeType($uploadedFile->tempName);
        $file = time() . "_" . $uploadedFile->name;

        $url = Yii::$app->urlManager->createAbsoluteUrl('/uploads/ckeditor/' . $file);
        $uploadPath = Yii::getAlias('@webroot') . '/uploads/ckeditor/' . $file;
        //extensive suitability check before doing anything with the file…
        if ($uploadedFile == null) {
            $message = "No file uploaded.";
        } else if ($uploadedFile->size == 0) {
            $message = "The file is of zero length.";
        } else if ($mime != "image/jpeg" && $mime != "image/png") {
            $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
        } else if ($uploadedFile->tempName == null) {
            $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
        } else {
            $message = "";
            $move = $uploadedFile->saveAs($uploadPath);
            if (!$move) {
                $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
            }
        }
        $funcNum = $_GET['CKEditorFuncNum'];
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }


}
