<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');
// require_once('assets/dompdf/lib/html5lib/Parser.php');
//require_once('assets/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php');
//require_once('assets/dompdf/lib/php-svg-lib/src/autoload.php');
//require_once('assets/dompdf/src/Autoloader.php');
//Dompdf\Autoloader::register();
use Dompdf\Dompdf;

class Mypdf
{
    public function __construct()
    {
        $ci = get_instance();
    }

    public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation = 'portrait')
    {
        $dompdf = new Dompdf();
        $html = $ci->load->view($view, $data, true);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => false));
    }
}
