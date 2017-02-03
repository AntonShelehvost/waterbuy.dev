<?php $this->load->view('/admin/header'); ?>
<div>
    <ul class="breadcrumb">
        <?php if (isset($bred)) {
            foreach ($bred as $value): ?>
                <li>
                    <?php if (!$value['flat']) { ?>
                        <a href="<?= $value['url'] ?>"><?= $value['title'] ?></a>
                    <?php } else { ?>
                        <span href="<?= $value['url'] ?>"><?= $value['title'] ?></span>
                    <?php } ?>
                </li>
            <?php endforeach;
        } else { ?>
            <li>
                <a href="/admin">Главная</a>
            </li>
        <?php } ?>
    </ul>
</div>
<?php echo $content; ?>
<?php $this->load->view('/admin/footer'); ?>
