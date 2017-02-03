<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 17.01.2017
 * Time: 16:20
 */
?>
<div class="col-sm-2 col-lg-2">
    <div class="sidebar-nav">
        <div class="nav-canvas">
            <div class="nav-sm nav nav-stacked"></div>
            <ul class="nav nav-pills nav-stacked main-menu">
                <?php if (($this->session->userdata('emp_employees_groups_id') > 0) && $this->session->userdata('emp_employees_groups_id') == 3) : ?>
                    <li class="nav-header">Личный настройки</li>
                    <li><a class="ajax-link" href="/profile">
                            <i class="glyphicon glyphicon-home"></i>
                            <span> Общие данные</span>
                        </a>
                    </li>
                    <li><a class="ajax-link" href="/profile/address"><i
                                class="glyphicon glyphicon-plus"></i>
                            <span> Адреса</span>
                        </a>
                    </li>
                    <li><a class="ajax-link" href="/profile/balance"><i
                                class="glyphicon glyphicon-eye-open"></i>
                            <span> История заказов</span>
                        </a>
                    </li>
                    <li><a class="ajax-link" href="/profile/rating"><i
                                class="glyphicon glyphicon-edit"></i>
                            <span> Ваш рейтинг</span>
                        </a>
                    </li>
                    <li>
                        <a class="ajax-link" href="/profile/template_order">
                            <i class="glyphicon glyphicon-font"></i>
                            <span> Оформить заказ</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (($this->session->userdata('emp_employees_groups_id') > 0) && $this->session->userdata('emp_employees_groups_id') == 2) : ?>
                    <li class="nav-header">Личный настройки</li>
                    <li><a class="ajax-link" href="/profile">
                            <i class="glyphicon glyphicon-home"></i>
                            <span> Общие данные</span>
                        </a>
                    </li>
                    <li><a class="ajax-link" href="/profile/address"><i
                                class="glyphicon glyphicon-plus"></i>
                            <span> Регионы доставки</span>
                        </a>
                    </li>
                    <li><a class="ajax-link" href="/profile/balance"><i
                                class="glyphicon glyphicon-eye-open"></i>
                            <span> История заказов</span>
                        </a>
                    </li>
                    <li><a class="ajax-link" href="/profile/rating"><i
                                class="glyphicon glyphicon-edit"></i>
                            <span> Ваш рейтинг</span>
                        </a>
                    </li>
                    <li>
                        <a class="ajax-link" href="/profile/template_order">
                            <i class="glyphicon glyphicon-font"></i>
                            <span> Оформить заказ</span>
                        </a>
                    </li>
                    <li>
                        <a class="ajax-link" href="/profile/products">
                            <i class="glyphicon glyphicon-font"></i>
                            <span> Ваши товары</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="nav-canvas">
            <div class="nav-sm nav nav-stacked"></div>
            <ul class="nav nav-pills nav-stacked main-menu">
                <?php if (($this->session->userdata('emp_employees_groups_id') > 0)) : ?>
                    <li class="nav-header">Настройки доступа</li>
                    <li><a class="ajax-link" href="/profile/change_password">
                            <i class="glyphicon glyphicon-home"></i>
                            <span> Смена пароля</span>
                        </a>
                    </li>
                    <li><a class="ajax-link" href="/profile/check_ip">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span> Проверка по IP</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
