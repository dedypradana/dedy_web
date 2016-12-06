<?php

/* 
 * Library Dedy Pradana
 * Helper Codeigniter
 */

function thumb($param=''){
    if($param){
        $img = explode('.', $param);
        $ext = $img[1];
        $name = $img[0].'_thumb.'.$ext;
    }else{
        $name = $param;
    }
    return $name;
}

function day_month($param=''){
    $dt = new DateTime($param);
    $format = $dt->format('Y-m-d');
    $res = explode('-', $format);
    $ret['day'] = $res[2];
    $ret['month'] = bulan_short($res[1]);
    return $ret;
}

function for_url($id='',$param=''){
    $data = str_replace(" ","-",$param);
    $title = strtolower($data);
    $url = $id.'-'.$title;
    return $url;
}
function curCname(){
    $CI =& get_instance();
    $url ='';
    $url  = $CI->router->fetch_directory().$CI->router->fetch_class();
    $url = strtolower($url);
    return $url;
}
function paging($cname, $totalrow, $limit, $uri="4", $force_cur='', $prefix='', $suffix=''){
    $CI =& get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = base_url().$cname;
    $config['total_rows'] = $totalrow;
    $config['per_page'] = $limit;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_link'] = '<<';
    $config['last_link'] = '>>';
    $config['prev_link'] = '<';
    $config['next_link'] = '>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close']= '</li>';
    $config['num_links'] = 3;
    $config['force_cur'] = $force_cur;
    $config['prefix'] = '';
    $config['suffix'] = '';
    $config['uri_segment'] = $uri;
    $config['cur_tag_open'] = '<li class="active"><a><strong>';
    $config['cur_tag_close'] = '</strong></a></li>';
    $config['use_page_numbers'] = false;
    $CI->pagination->initialize($config);
    return $CI->pagination->create_links();
}

function uri($ke){
    $CI =& get_instance();
    return $CI->uri->segment($ke);
}

function read_more($string=''){
    $words = 180;
    $string = strip_tags($string);
    if (strlen($string) > $words) {
        // truncate string
        $stringCut = substr($string, 0, $words);
        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'[...]'; 
    }
    echo $string;
}
function read_more_meta($string=''){
    $words = 250;
    $string = strip_tags($string);
    if (strlen($string) > $words) {
        // truncate string
        $stringCut = substr($string, 0, $words);
        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'[...]'; 
    }
    return $string;
}
function read_more_blog($string=''){
    $words = 250;
    $string = strip_tags($string);
    if (strlen($string) > $words) {
        // truncate string
        $stringCut = substr($string, 0, $words);
        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'[...]'; 
    }
    echo $string;
}

function encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function decode($data) {
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

function succ_msg($msg) {
    return '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>Berhasil !</strong><br>' . $msg . '
							</div>';
}

function warn_msg($msg) {
    return '<div class="alert alert-warning alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>Perhatian!</strong><br>' . $msg . '
							</div>';
}

function err_msg($msg) {
    return '<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>Kesalahan!</strong><br>' . $msg . '
							</div>';
}

function toRupiah($data = '') {
    if ($data <= 0 || $data == '') {
        return 'Rp ' . '0,-';
    } else {
        return 'Rp ' . number_format($data, 0, ',', '.') . ',-';
    }
}

function changeDateFormat($format, $date) {
    if ($date == '') {
        return '';
    }
    switch ($format) {
        case 'full_database':
            return date('Y-m-d H:i:s', strtotime($date));
            break;
        case "database":
            return date('Y-m-d', strtotime($date));
            break;
        case "webview":
            return date('d M Y', strtotime($date));
            break;
        case "datepicker":
            return date('m/d/Y', strtotime($date));
            break;
        case "download":
            return date('d/m/Y', strtotime($date));
            break;
    }
}

function get_role($role_id = '') {
    $CI = &get_instance();
    $CI->load->model('M_user');

    $role = $CI->M_user->get_role();

    return @$role[$role_id]->module;
}

function roles_label($param) {
    $CI = &get_instance();
    if ($param == '5') {
        return '<span class="label label-success label-xs">' . get_role(5) . '</span>';
    } else {
        // return $t;
        $t = explode(',', $param);
        print_r($t);
        exit();
        $jml_data = count($t);
        $html_roles = '';
        for ($i = 0; $i < $jml_data; $i++) {
            $html_roles .= $param . '<span class="label label-success label-xs">' . get_role($t[$i]) . '</span> ';
        }
        // echo $html_roles;
        return $html_roles;
    }
}

function bulanIndonesia($value = '') {
    $bulan = array('1' => 'Januari', // array bulan konversi
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    );
    return $bulan[$value];
}

function nama_table($value = '') {
    $value = explode('-', $value);
    return $value[0];
}

function getJumlahSOP($id_jabatan) {
    $CI = &get_instance();
    $CI->load->model('M_global');

    $jumlah = $CI->M_global->getJumlahSOP($id_jabatan);

    return @$jumlah;
}

function placeholder($value = '') {
    $res = ucwords(str_replace('_', ' ', $value));
    return $res;
}

function small_placeholder($value = '') {
    $res = strtolower(placeholder($value));
    return $res;
}

function format_rupiah($value = '') {
    $value = intval($value);
    $res = number_format($value, 0, ',', '.');
    return $res;
}

function format_date($value = '') {
    $temp = explode('-', $value);
    return $temp['2'] . '-' . $temp['1'] . '-' . $temp['0'];
}

function get_day($d1, $d2) {
    return round(abs(strtotime($d1) - strtotime($d2)) / 86400);
}

function nilai_maks($tabel = '', $field = '') {
    $CI = &get_instance();
    $sql = "SELECT MAX(" . $field . ") as max FROM " . $tabel;
    $max = $CI->db->query($sql)->row()->max;
    // echo "<pre>";print_r($max);exit;
    $no = intval($max) + 1;
    return $no;
}

function tgl_indo($tgl='') {
    if($tgl){
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }else{
        return '';
    }
}

function bulan_short($bln) {
    switch ($bln) {
        case 1:
            return "Jan";
            break;
        case 2:
            return "Feb";
            break;
        case 3:
            return "Mar";
            break;
        case 4:
            return "Apr";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Jun";
            break;
        case 7:
            return "Jul";
            break;
        case 8:
            return "Aug";
            break;
        case 9:
            return "Sep";
            break;
        case 10:
            return "Oct";
            break;
        case 11:
            return "Nov";
            break;
        case 12:
            return "Dec";
            break;
    }
}

function bulan($bln) {
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

