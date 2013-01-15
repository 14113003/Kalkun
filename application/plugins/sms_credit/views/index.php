<?php $this->load->view('js_users');?>

<div id="window_container">
    <div id="window_title">
        <div id="window_title_left"><?php echo $title;?></div>
        <div id="window_title_right">
            <?php echo form_open('users', array('class' => 'search_form')); ?>
            <input type="text" name="search_name" size="20" class="search_name" value="" />
            <?php echo form_close(); ?>
            &nbsp;
            <a href="<?php echo site_url('plugin/sms_credit/packages');?>" class="nicebutton">Packages</a>	
            <a href="#" class="nicebutton addpbkcontact">&#43; <?php echo lang('tni_user_addp');?></a>	
        </div>
    </div>

    <div id="window_content">

        <table>
        <?php foreach($users->result() as $tmp): ?>
        <tr id="<?php echo $tmp->id_user;?>">
        <td>
        <div class="two_column_container contact_list">
            <div class="left_column">
            <div id="pbkname">
                <span style="font-weight: bold;"><?php echo $tmp->realname;?></span>
                <?php if(!is_null($tmp->template_name)): echo "<sup>( $tmp->template_name )</sup>"; ?>
                <?php else: echo "<sup>( No package )</sup>"; ?>
                <?php endif;?>
            </div>	
        </div>
        <div class="right_column">
        <span class="pbk_menu">
        <a class="edit_user simplelink" href="#">Change Package</a>
        </span>
        </td></tr>
        <?php endforeach;?>
        </table>

    </div>
</div>

<!-- Add User dialog -->	
<div id="users_container" class="dialog" style="display: none">
<p id="validateTips"><?php echo lang('tni_form_fields_required'); ?></p>
<?php echo form_open('plugin/sms_credit/add_users', array('id' => 'addUser'));?>
<fieldset>
<label for="name"><?php echo lang('tni_user_person_name'); ?></label>
<input type="text" name="realname" id="realname" class="text ui-widget-content ui-corner-all" />
<label for="number"><?php echo lang('tni_user_phone_number'); ?></label>
<input type="text" name="phone_number" id="phone_number" class="text ui-widget-content ui-corner-all" />
<label for="name"><?php echo lang('tni_user_username'); ?></label>
<input type="text" name="username" id="username" class="text ui-widget-content ui-corner-all" />
<label for="password"><?php echo lang('tni_user_password'); ?></label>
<input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all" />
<label for="confirm_password"><?php echo lang('tni_user_conf_password'); ?></label>
<input type="password" name="confirm_password" id="confirm_password" class="text ui-widget-content ui-corner-all" />
<label for="level"><?php echo lang('tni_level'); ?></label>
<?php
$level = array('admin' => lang('kalkun_level_admin'), 'user' => lang('kalkun_level_user'));
$option = 'class="text ui-widget-content ui-corner-all"';
echo form_dropdown('level', $level, 'user', $option);
?>
<br /><br />

<label for="package">Package</label>
<?php
foreach($packages->result_array() as $row)
{
    $package[$row['id_credit_template']] = $row['template_name'];
}
$option = 'class="text ui-widget-content ui-corner-all"';
echo form_dropdown('package', $package, '', $option);
?>
<br /><br />

<label for="package_start">Package Start</label>
<input type="text" style="display: inline; width: 80%" name="package_start" id="package_start" class="text datepicker ui-widget-content ui-corner-all" />

<label for="package_end">Package End</label>
<input type="text" style="display: inline; width: 80%" name="package_end" id="package_end" class="text datepicker ui-widget-content ui-corner-all" />

<?php if(isset($users)): ?> 
<input type="hidden" name="id_user" id="id_user" />
<?php endif;?>
</fieldset>
<?php echo form_close();?>
</div>

