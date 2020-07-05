<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = 'error';


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';


$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addUser'] = "user/addUser";
$route['addNewUser'] = "user/addNewUser";
$route['editOldUsr'] = "user/editOldUsr";
$route['editOldUsr/(:num)'] = "user/editOldUsr/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";

$route['DaftarPejabat'] = 'pejabat/DaftarPejabat';
$route['DaftarPejabat/(:num)'] = "pejabat/DaftarPejabat/$1";
$route['addPejabat'] = "pejabat/addPejabat";
$route['addNewPejabat'] = "pejabat/addNewPejabat";
$route['editOldPjb'] = "pejabat/editOldPjb";
$route['editOldPjb/(:num)'] = "pejabat/editOldPjb/$1";
$route['editPejabat'] = "pejabat/editPejabat";
$route['deletePejabat'] = "pejabat/deletePejabat";

$route['aksi_upload'] = 'upload/aksi_upload';
$route['aksi_upload/(:any)'] = "upload/aksi_upload/$1";
$route['cariBioAdm'] = 'upload/cariBioAdm';
$route['cariBioAdm2'] = 'upload/cariBioAdm2';
$route['ReadFileX'] = 'upload/ReadFileX';
$route['HookBioAdmList2'] = "upload/HookBioAdmList2";

$route['DaftarLaporan'] = 'laporan/DaftarLaporan';
$route['DaftarLaporan/(:num)'] = "laporan/DaftarLaporan/$1";
$route['lapcetakpdf'] = "laporan/cetakpdf";
$route['lapcetakpdf/(:any)/(:any)/(:any)/(:any)'] = "laporan/lapcetakpdf/$1/$2/$3/$4";


$route['DaftarJenisDok'] = 'jenisdok/DaftarJenisDok';
$route['DaftarJenisDok/(:num)'] = "jenisdok/DaftarJenisDok/$1";
$route['addJenisDok'] = "jenisdok/addJenisDok";
$route['addNewJenisDok'] = "jenisdok/addNewJenisDok";
$route['editOldJdk'] = "jenisdok/editOldJdk";
$route['editOldJdk/(:num)'] = "jenisdok/editOldJdk/$1";
$route['editJenisDok'] = "jenisdok/editJenisDok";
$route['deleteJenisDok'] = "jenisdok/deleteJenisDok";

$route['DaftarBioAdm'] = 'bioadm/DaftarBioAdm';
$route['DaftarBioAdm/(:num)'] = "bioadm/DaftarBioAdm/$1";
$route['addBioAdm'] = "bioadm/addBioAdm";
$route['addNewBioAdm'] = "bioadm/addNewBioAdm";
$route['detailBam'] = "bioadm/detailBam";
$route['detailBam/(:num)'] = "bioadm/detailBam/$1";
$route['editOldBam'] = "bioadm/editOldBam";
$route['editOldBam/(:num)'] = "bioadm/editOldBam/$1";
$route['editBioAdm'] = "bioadm/editBioAdm";
$route['deleteBioAdm'] = "bioadm/deleteBioAdm";
$route['import'] = "bioadm/import";

$route['DaftarRegLeg'] = 'regleg/DaftarRegLeg';
$route['DaftarRegLeg/(:num)'] = "regleg/DaftarRegLeg/$1";
$route['setDateNew'] = 'regleg/setDateNew';
$route['addRegLeg'] = "regleg/addRegLeg";
$route['addNewRegLeg'] = "regleg/addNewRegLeg";
$route['editOldRlg'] = "regleg/editOldRlg";
$route['editOldRlg/(:num)'] = "regleg/editOldRlg/$1";
$route['editRegLeg'] = "regleg/editRegLeg";
$route['deleteRegLeg'] = "regleg/deleteRegLeg";
$route['cetakpdf'] = "regleg/cetakpdf";
$route['cetakTunggal/(:num)'] = "regleg/cetakTunggal/$1";
$route['cetakpdf/(:any)/(:any)/(:any)'] = "regleg/cetakpdf/$1/$2/$3";
$route['HookBioAdmList'] = "regleg/HookBioAdmList";
$route['viewTemplate/(:num)'] = "regleg/viewTemplate/$1";

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

$route['editConfig'] = "config/editConfig";

/* End of file routes.php */
/* Location: ./application/config/routes.php */