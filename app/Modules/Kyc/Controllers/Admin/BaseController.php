<?php

namespace App\Modules\Kyc\Controllers\Admin;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Libraries\Blockchain_lib;
use App\Libraries\Template;
use App\Libraries\UploadImage;
use App\Models\Common_model;
use App\Modules\Kyc\Models\SMS_model;
use App\Modules\Nfts\Models\Admin\Nfts_model;
use App\Modules\User\Models\Admin\User_model;
use CodeIgniter\Controller;

class BaseController extends Controller {

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form', 'url', 'lang_helper'];

    /**
     * Constructor.
     */

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:

        //Calling Libraries
        $this->session    = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->request    = \Config\Services::request();
        $this->pager      = \Config\Services::pager();
        $this->uri        = service('uri');
        $this->db         = db_connect();
        $this->symbol     = 'ETH';

        $this->BASE_VIEW = "App\Modules\Kyc\Views\Admin";

        //calling Model
        $this->template     = new Template();
        $this->blockchain   = new Blockchain_lib();
        $this->common_model = new Common_model();
        $this->imagelibrary = new UploadImage();
        $this->nfts_model   = new Nfts_model();
        $this->user_model   = new User_model();
        $this->sms_lib      = new SMS_model();
    }
}