<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<h2><?php echo i18n('General_Settings')?></h2>
<br>
<?php
if (config('show.version') == 'false') {
    if(file_exists('cache/installedVersion.json')) {
        unlink('cache/installedVersion.json');
    }
}
?>
<?php if (!extension_loaded('intl')) { ?>
<div class="callout callout-info">
<h5><i class="fa fa-info"></i> Note:</h5>
Please install and enable the INTL extension to format the date format to your local language.
</div>
<?php } ?>
<nav>
  <div class="nav nav-tabs" id="nav-tab">
    <a class="nav-item nav-link active" id="nav-general-tab" href="<?php echo site_url();?>admin/config"><?php echo i18n('General');?></a>
    <a class="nav-item nav-link" id="nav-profile-tab" href="<?php echo site_url();?>admin/config/reading"><?php echo i18n('Reading');?></a>
    <a class="nav-item nav-link" id="nav-writing-tab" href="<?php echo site_url();?>admin/config/writing"><?php echo i18n('Writing');?></a>
    <a class="nav-item nav-link" id="nav-widget-tab" href="<?php echo site_url();?>admin/config/widget"><?php echo i18n('Widget');?></a>
    <a class="nav-item nav-link" id="nav-metatags-tab" href="<?php echo site_url();?>admin/config/metatags"><?php echo i18n('Metatags');?></a>
    <a class="nav-item nav-link" id="nav-security-tab" href="<?php echo site_url();?>admin/config/security"><?php echo i18n('Security');?></a>
    <a class="nav-item nav-link" id="nav-performance-tab" href="<?php echo site_url();?>admin/config/performance"><?php echo i18n('Performance');?></a>
    <a class="nav-item nav-link" id="nav-custom-tab" href="<?php echo site_url();?>admin/config/custom"><?php echo i18n('Custom');?></a>
  </div>
</nav>

<div class="alert alert-info mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5><i class="fa fa-rocket text-primary"></i> Europa Depo Güncelleme Sistemi</h5>
            <p class="mb-0">Europa Depo tema ve özelliklerini GitHub üzerinden güncelleyebilirsiniz.</p>
        </div>
        <div>
            <a href="<?php echo site_url();?>admin/europa-update" class="btn btn-primary">
                <i class="fa fa-rocket"></i> Europa Depo Güncelleme
            </a>
        </div>
    </div>
</div>
<br><br>
<form method="POST">
<input type="hidden" name="csrf_token" value="<?php echo get_csrf(); ?>">
  <div class="form-group row">
    <label for="site.url" class="col-sm-2 col-form-label"><?php echo i18n('Address_URL');?></label>
    <div class="col-sm-10">
      <input type="text" name="-config-site.url" class="form-control" id="site.url" value="<?php echo valueMaker(config('site.url'));?>" placeholder="https://www.htmly.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="blog.title" class="col-sm-2 col-form-label"><?php echo i18n('Blog_Title');?></label>
    <div class="col-sm-10">
      <input type="text" name="-config-blog.title" class="form-control" id="blog.title" value="<?php echo valueMaker(config('blog.title'));?>" placeholder="<?php echo i18n('Blog_Title_Placeholder');?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="blog.tagline" class="col-sm-2 col-form-label"><?php echo i18n('Tagline');?></label>
    <div class="col-sm-10">
      <input type="text" name="-config-blog.tagline" class="form-control" id="blog.tagline" value="<?php echo valueMaker(config('blog.tagline'));?>" placeholder="<?php echo i18n('Tagline_Placeholder');?>">
      <small><em><?php echo i18n('Tagline_description');?></em></small>
    </div>
  </div>
  <div class="form-group row">
    <label for="blog.description" class="col-sm-2 col-form-label"><?php echo i18n('Description');?></label>
    <div class="col-sm-10">
      <textarea id="blog.description" name="-config-blog.description" class="form-control"><?php echo valueMaker(config('blog.description'));?></textarea>
      <small><em><?php echo i18n('Blog_Description');?></em></small>
    </div>
  </div>
  <div class="form-group row">
    <label for="language" class="col-sm-2 col-form-label"><?php echo i18n('Language');?></label>
    <div class="col-sm-10">
    <select class="form-control" id="language" name="-config-language">
    <?php foreach (glob('lang/*.ini') as $file) { ?>
       <option value="<?php echo pathinfo($file)['filename'];?>" <?php if (config('language') === pathinfo($file)['filename']):?>selected<?php endif;?>><?php echo pathinfo($file)['filename'];?></option>
    <?php } ?>
    </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="timezone" class="col-sm-2 col-form-label"><?php echo i18n('Timezone');?></label>
    <div class="col-sm-10">
    <select class="form-control" id="timezone" name="-config-timezone">
    <?php foreach (timezone_identifiers_list() as $zone) { ?>
       <option value="<?php echo $zone;?>" <?php if (config('timezone') === $zone):?>selected<?php endif;?>><?php echo $zone;?></option>
    <?php } ?>
    </select>
    </div>
  </div>
  <div class="form-group row">
  <?php $time = new DateTime('NOW'); $date = $time->format("Y-m-d H:i:s");?>
    <label class="col-sm-2 col-form-label"><?php echo i18n('Date_Format');?></label>
    <div class="col-sm-10">
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-date.format" id="date.format1" value="d F Y" <?php if (config('date.format') === 'd F Y'):?>checked<?php endif;?>>
          <label class="form-check-label" for="date.format1">
            <?php echo format_date(strtotime($date), 'd F Y'); ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-date.format" id="date.format2" value="F d, Y" <?php if (config('date.format') === 'F d, Y'):?>checked<?php endif;?>>
          <label class="form-check-label" for="date.format2">
            <?php echo format_date(strtotime($date), 'F d, Y'); ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-date.format" id="date.format3" value="d M Y" <?php if (config('date.format') === 'd M Y'):?>checked<?php endif;?>>
          <label class="form-check-label" for="date.format3">
            <?php echo format_date(strtotime($date), 'd M Y'); ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-date.format" id="date.format4" value="M d, Y" <?php if (config('date.format') === 'M d, Y'):?>checked<?php endif;?>>
          <label class="form-check-label" for="date.format4">
            <?php echo format_date(strtotime($date), 'M d, Y'); ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-date.format" id="date.format5" value="d/m/Y" <?php if (config('date.format') === 'd/m/Y'):?>checked<?php endif;?>>
          <label class="form-check-label" for="date.format5">
            <?php echo format_date(strtotime($date), 'd/m/Y'); ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-date.format" id="date.format6" value="m/d/Y" <?php if (config('date.format') === 'm/d/Y'):?>checked<?php endif;?>>
          <label class="form-check-label" for="date.format6">
            <?php echo format_date(strtotime($date), 'm/d/Y'); ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-date.format" id="date.format7" value="Y-m-d" <?php if (config('date.format') === 'Y-m-d'):?>checked<?php endif;?>>
          <label class="form-check-label" for="date.format7">
            <?php echo format_date(strtotime($date), 'Y-m-d'); ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-date.format" id="date.format8" value="d.m.Y" <?php if (config('date.format') === 'd.m.Y'):?>checked<?php endif;?>>
          <label class="form-check-label" for="date.format8">
            <?php echo format_date(strtotime($date), 'd.m.Y'); ?>
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="views.root" class="col-sm-2 col-form-label"><?php echo i18n('Blog_Theme');?></label>
    <div class="col-sm-10">
    <select class="form-control" id="views.root" name="-config-views.root">
    <?php foreach (glob('themes/*/layout.html.php') as $folder) { ?>
       <?php $theme = explode('/',pathinfo($folder)['dirname']); global $config_file; $this_config = parse_ini_file($config_file, true);?>
       <option value="<?php echo pathinfo($folder)['dirname'];?>" <?php if ($this_config['views.root'] === pathinfo($folder)['dirname']):?>selected<?php endif;?>><?php echo $theme['1'];?></option>
    <?php } ?>
    </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="blog.copyright" class="col-sm-2 col-form-label"><?php echo i18n('Copyright_Line');?></label>
    <div class="col-sm-10">
      <input type="text" name="-config-blog.copyright" class="form-control" id="blog.copyright" value="<?php echo valueMaker(config('blog.copyright'));?>" placeholder="<?php echo i18n('Copyright_Line_Placeholder');?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label"><?php echo i18n('set_version_publicly');?></label>
    <div class="col-sm-10">
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-show.version" id="show.version1" value="true" <?php if (config('show.version') === 'true'):?>checked<?php endif;?>>
          <label class="form-check-label" for="show.version1">
            <?php echo i18n('Enable');?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-show.version" id="show.version2" value="false" <?php if (config('show.version') === 'false'):?>checked<?php endif;?>>
          <label class="form-check-label" for="show.version2">
            <?php echo i18n('Disable');?>
          </label>
        </div>
      </div>
      <small><em><?php echo i18n('explain_version');?></em></small>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label"><?php echo i18n('admin_theme');?></label>
    <div class="col-sm-10">
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-admin.theme" id="admin.theme1" value="light" <?php if (config('admin.theme') === 'light' || is_null(config('admin.theme'))):?>checked<?php endif;?>>
          <label class="form-check-label" for="admin.theme1">
            <?php echo i18n('admin_theme_light');?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-admin.theme" id="admin.theme2" value="dark" <?php if (config('admin.theme') === 'dark'):?>checked<?php endif;?>>
          <label class="form-check-label" for="admin.theme2">
            <?php echo i18n('admin_theme_dark');?>
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label"><?php echo i18n('fulltext_search');?></label>
    <div class="col-sm-10">
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-fulltext.search" id="fulltext.search1" value="true" <?php if (config('fulltext.search') === 'true'):?>checked<?php endif;?>>
          <label class="form-check-label" for="fulltext.search1">
            <?php echo i18n('Enable');?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="-config-fulltext.search" id="fulltext.search2" value="false" <?php if (config('fulltext.search') === 'false'):?>checked<?php endif;?>>
          <label class="form-check-label" for="fulltext.search2">
            <?php echo i18n('Disable');?>
          </label>
        </div>
      </div>
    </div>
  </div>
  
  <hr style="margin: 30px 0; border-top: 2px solid #667eea;">
  
  <h4 style="color: #667eea; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
    <i class="fa fa-robot"></i> Europa AI İçerik Oluşturucu Ayarları
  </h4>
  
  <div class="alert alert-info" style="margin-bottom: 20px;">
    <i class="fa fa-info-circle"></i> <strong>ChatGPT API Entegrasyonu</strong><br>
    Admin panelinde otomatik içerik oluşturmak için OpenAI API anahtarınızı girin.
  </div>
  
  <div class="form-group row">
    <label for="chatgpt.api.key" class="col-sm-2 col-form-label">
      <i class="fa fa-key text-primary"></i> ChatGPT API Key
    </label>
    <div class="col-sm-10">
      <input type="password" 
             class="form-control" 
             id="chatgpt.api.key" 
             name="-config-chatgpt.api.key" 
             value="<?php echo config('chatgpt.api.key');?>" 
             placeholder="sk-...">
      <small class="form-text text-muted">
        <i class="fa fa-external-link"></i> 
        OpenAI API anahtarınızı girin. 
        <a href="https://platform.openai.com/api-keys" target="_blank">API Key almak için tıklayın</a>
      </small>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="chatgpt.model" class="col-sm-2 col-form-label">
      <i class="fa fa-cogs text-primary"></i> ChatGPT Model
    </label>
    <div class="col-sm-10">
      <select class="form-control" id="chatgpt.model" name="-config-chatgpt.model">
        <option value="gpt-3.5-turbo" <?php if(config('chatgpt.model') == 'gpt-3.5-turbo' || !config('chatgpt.model')) echo 'selected'; ?>>GPT-3.5 Turbo (Hızlı ve Ekonomik)</option>
        <option value="gpt-4" <?php if(config('chatgpt.model') == 'gpt-4') echo 'selected'; ?>>GPT-4 (Kaliteli)</option>
        <option value="gpt-4-turbo" <?php if(config('chatgpt.model') == 'gpt-4-turbo') echo 'selected'; ?>>GPT-4 Turbo (Hızlı ve İyi)</option>
        <option value="gpt-4o" <?php if(config('chatgpt.model') == 'gpt-4o') echo 'selected'; ?>>GPT-4o (Çok Modalı)</option>
        <option value="gpt-5" <?php if(config('chatgpt.model') == 'gpt-5') echo 'selected'; ?>>GPT-5 (En Güncel ve En İyi) 🔥</option>
      </select>
      <small class="form-text text-muted">
        <i class="fa fa-lightbulb"></i> 
        <strong>Öneriler:</strong> GPT-3.5 (ekonomik), GPT-4 (kaliteli), GPT-5 (en güncel ve en iyi) 🚀
      </small>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="chatgpt.max.tokens" class="col-sm-2 col-form-label">
      <i class="fa fa-text-width text-primary"></i> Maksimum Token
    </label>
    <div class="col-sm-10">
      <input type="number" 
             class="form-control" 
             id="chatgpt.max.tokens" 
             name="-config-chatgpt.max.tokens" 
             value="<?php echo config('chatgpt.max.tokens') ?: '4000';?>" 
             min="1000" 
             max="8000" 
             placeholder="4000">
      <small class="form-text text-muted">
        <i class="fa fa-calculator"></i> 
        Oluşturulacak içeriğin maksimum uzunluğu (1000-8000 arası, 4000+ önerilir)
      </small>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="chatgpt.temperature" class="col-sm-2 col-form-label">
      <i class="fa fa-thermometer-half text-primary"></i> Yaratıcılık Seviyesi
    </label>
    <div class="col-sm-10">
      <select class="form-control" id="chatgpt.temperature" name="-config-chatgpt.temperature">
        <option value="0.3" <?php if(config('chatgpt.temperature') == '0.3') echo 'selected'; ?>>Düşük (0.3) - Tutarlı ve Profesyonel</option>
        <option value="0.7" <?php if(config('chatgpt.temperature') == '0.7' || !config('chatgpt.temperature')) echo 'selected'; ?>>Orta (0.7) - Dengeli</option>
        <option value="1.0" <?php if(config('chatgpt.temperature') == '1.0') echo 'selected'; ?>>Yüksek (1.0) - Yaratıcı</option>
      </select>
      <small class="form-text text-muted">
        <i class="fa fa-palette"></i> 
        Düşük: Daha tutarlı, Yüksek: Daha yaratıcı içerik
      </small>
    </div>
  </div>
  
  <hr />
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary"><?php echo i18n('Save_Config');?></button>
    </div>
  </div>
</form>
