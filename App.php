<?php
namespace app\core;

// very important if you want to get objects form SiteControllers
// use app\controllers\SiteController;
// use app\core\Controller;


/* instead of wirte require or include in every page we want to use this class we use namespace with the path of it 
# note that app/ = ./ we define that in composer.json file then all what you must do is to specify your class name only where ever you 
want to use it but you must write down requier __DIR__ . "/vendor/autoload.php" to use it and also write use app/core so you have
have to wite only the class name ..... $n =new app/core/App();  ==> $n = new App();
*/

// ************************don't know what is that*************************** 
/**
 * Class App
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package app\core
 */

class App
{
    public string $layout = 'main';
    public static App $app;
    public static string $ROOT_DIR;
    public string $userClass = " ";
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Database $db;
    public ?UserModel $user;
    public Session $session;
    public View $view;
    public function __construct(
        $root_dir,
        array $config
    ) {
        $this->userClass = $config['userClass'];
        $this->session = new Session();
        $this->db = new Database($config['db']);
        self::$ROOT_DIR = $root_dir;
        self::$app = $this;
        $this->request = new Request();
        $this->view = new View();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);// unless this line you will get this Fatal error.... you have define always your objects logically ^_^
        //Uncaught Error: Typed property app\core\App::$router must not be accessed before initialization in C:\xampp\htdocs\mvc\index.php:9 Stack trace: #0 {main} thrown in C:\xampp\htdocs\mvc\index.php on line 9
        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }
    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setstatuscode($e->getCode());
            echo $this->view->renderView('_error', [
                'exception' => $e,
            ]);
        }
        // $path = $this->request->getpath();   we don't use this because we don't interact with global path directly unless through router
        // echo '<pre>';
        // var_dump($pa);
        // echo '</pre>';
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
    public function login(UserModel $user)
    {
        $this->user = $user;
        $primarykey = $user->primaryKey();
        $primaryValue = $user->{$primarykey};
        $this->session->set('user', $primaryValue);
        return true;
    }
    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
    public static function isGuest()
    {
        return !self::$app->user;
    }
}