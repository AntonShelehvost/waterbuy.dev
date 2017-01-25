<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 17.01.2017
 * Time: 16:07
 */

?>
<?php
$this->load->view('admin/header');
?>

<?php echo $content; ?>

<?php $this->load->view('/admin/footer', (isset($data)) ? $data : []); ?>

