<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php

$type = $type;

if ($type != 'is_post' && $type != 'is_image' && $type != 'is_video' && $type != 'is_audio' && $type != 'is_link' && $type != 'is_quote') {
    $add = site_url() . 'admin/content';
    header("location: $add");
}

$desc = get_category_info(null);

$tags = tag_cloud(true);
$tagslang = "content/data/tags.lang";
if (file_exists($tagslang)) {
    $ptags = unserialize(file_get_contents($tagslang));
    $tkey = array_keys($tags);
    if (!empty($ptags)) {
        $newlang = array_intersect_key($ptags, array_flip($tkey));
    } else {
        $newlang = array_combine($tkey, $tkey);
    }
    $tmp = serialize($newlang);
    file_put_contents($tagslang, print_r($tmp, true), LOCK_EX);
}

$images = image_gallery(null, 1, 40);

$fields = array();
$field_file= 'content/data/field/post.json';
if (file_exists($field_file)) {
    $fields = json_decode(file_get_contents($field_file, true));
}
?>

<link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>system/admin/editor/css/editor.css"/>
<script src="<?php echo site_url() ?>system/resources/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo site_url() ?>system/admin/editor/js/Markdown.Converter.js"></script>
<script type="text/javascript" src="<?php echo site_url() ?>system/admin/editor/js/Markdown.Sanitizer.js"></script>
<script type="text/javascript" src="<?php echo site_url() ?>system/admin/editor/js/Markdown.Editor.js"></script>
<script type="text/javascript" src="<?php echo site_url() ?>system/admin/editor/js/Markdown.Extra.js"></script>
<link rel="stylesheet" href="<?php echo site_url() ?>system/resources/css/jquery-ui.css">

<!-- Zenginleştirilmiş Editör için ek kütüphaneler kaldırıldı (güvenlik riski) -->

<!-- Modern Admin Panel Styles -->
<style>
.modern-admin-container {
    background: #f8f9fa;
    min-height: 100vh;
    padding: 20px 0;
}

.content-editor-wrapper {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden;
    margin-bottom: 20px;
}

.editor-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 20px 30px;
    border-bottom: none;
}

.editor-header h2 {
    margin: 0;
    font-size: 24px;
    font-weight: 600;
}

.editor-header p {
    margin: 5px 0 0 0;
    opacity: 0.9;
    font-size: 14px;
}

.editor-main {
    display: flex;
    min-height: 600px;
}

.editor-content {
    flex: 1;
    padding: 30px;
    background: white;
}

.editor-sidebar {
    width: 350px;
    background: #f8f9fa;
    border-left: 1px solid #e9ecef;
    padding: 30px 25px;
    overflow-y: auto;
}

.sidebar-section {
    background: white;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    border: 1px solid #e9ecef;
}

.sidebar-section h4 {
    margin: 0 0 15px 0;
    font-size: 16px;
    font-weight: 600;
    color: #495057;
    display: flex;
    align-items: center;
    gap: 8px;
}

.sidebar-section h4 i {
    color: #667eea;
    font-size: 18px;
}

.form-group-modern {
    margin-bottom: 20px;
}

.form-group-modern label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #495057;
    font-size: 14px;
}

.form-control-modern {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: white;
}

.form-control-modern:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.title-input {
    font-size: 28px !important;
    font-weight: 600;
    padding: 20px 25px;
    border: none;
    border-bottom: 3px solid #e9ecef;
    border-radius: 0;
    background: transparent;
    margin-bottom: 25px;
}

.title-input:focus {
    border-bottom-color: #667eea;
    box-shadow: none;
}

.title-input::placeholder {
    color: #adb5bd;
    font-weight: 400;
}

.btn-modern {
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 14px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-primary-modern {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-primary-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.btn-secondary-modern {
    background: #6c757d;
    color: white;
}

.btn-secondary-modern:hover {
    background: #5a6268;
    transform: translateY(-2px);
}

.editor-actions {
    padding: 20px 30px;
    background: #f8f9fa;
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.media-preview {
    margin-top: 10px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    border: 2px dashed #dee2e6;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.media-preview:hover {
    border-color: #667eea;
    background: #f0f2ff;
}

.media-preview img {
    max-width: 100%;
    max-height: 150px;
    border-radius: 6px;
}

.tag-input-wrapper {
    position: relative;
}

.tag-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #e9ecef;
    border-top: none;
    border-radius: 0 0 8px 8px;
    max-height: 200px;
    overflow-y: auto;
    z-index: 1000;
    display: none;
}

.required-badge {
    color: #dc3545;
    font-size: 12px;
    margin-left: 4px;
}

.info-text {
    font-size: 12px;
    color: #6c757d;
    margin-top: 5px;
    line-height: 1.4;
}

/* Zenginleştirilmiş WMD Editör Stilleri */
.wmd-button-bar {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-bottom: none;
    border-radius: 8px 8px 0 0;
    padding: 10px 15px;
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    align-items: center;
}

.wmd-button {
    background: white;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    font-size: 14px;
    color: #495057;
}

.wmd-button:hover {
    background: #667eea;
    color: white;
    border-color: #667eea;
    transform: translateY(-1px);
}

.wmd-button:active {
    transform: translateY(0);
}

.wmd-spacer {
    width: 1px;
    height: 20px;
    background: #dee2e6;
    margin: 0 5px;
}

.wmd-input {
    border: 2px solid #e9ecef;
    border-top: none;
    border-radius: 0 0 8px 8px;
    padding: 20px;
    font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    font-size: 14px;
    line-height: 1.6;
    resize: vertical;
    min-height: 400px;
    transition: border-color 0.3s ease;
}

.wmd-input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.wmd-preview {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 20px;
    background: white;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
    max-height: 500px;
    overflow-y: auto;
}

.wmd-preview h1, .wmd-preview h2, .wmd-preview h3 {
    color: #2c3e50;
    margin-top: 24px;
    margin-bottom: 16px;
}

.wmd-preview h1 {
    font-size: 28px;
    border-bottom: 2px solid #e9ecef;
    padding-bottom: 8px;
}

.wmd-preview h2 {
    font-size: 24px;
}

.wmd-preview h3 {
    font-size: 20px;
}

.wmd-preview p {
    margin-bottom: 16px;
}

.wmd-preview blockquote {
    border-left: 4px solid #667eea;
    margin: 16px 0;
    padding: 16px 20px;
    background: #f8f9fa;
    border-radius: 0 8px 8px 0;
}

.wmd-preview code {
    background: #f1f3f4;
    padding: 2px 6px;
    border-radius: 4px;
    font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    font-size: 13px;
    color: #d73a49;
}

.wmd-preview pre {
    background: #f6f8fa;
    border: 1px solid #e1e4e8;
    border-radius: 8px;
    padding: 16px;
    overflow-x: auto;
    margin: 16px 0;
}

.wmd-preview pre code {
    background: none;
    padding: 0;
    color: inherit;
}

.wmd-preview ul, .wmd-preview ol {
    margin: 16px 0;
    padding-left: 24px;
}

.wmd-preview li {
    margin-bottom: 8px;
}

.wmd-preview table {
    border-collapse: collapse;
    width: 100%;
    margin: 16px 0;
}

.wmd-preview th, .wmd-preview td {
    border: 1px solid #e1e4e8;
    padding: 8px 12px;
    text-align: left;
}

.wmd-preview th {
    background: #f6f8fa;
    font-weight: 600;
}

.wmd-preview img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 16px 0;
}

.wmd-preview a {
    color: #667eea;
    text-decoration: none;
}

.wmd-preview a:hover {
    text-decoration: underline;
}

/* Ek Editör Araçları */
.editor-toolbar-extra {
    background: white;
    border: 2px solid #e9ecef;
    border-top: none;
    border-bottom: none;
    padding: 10px 15px;
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
}

.toolbar-group {
    display: flex;
    gap: 5px;
    align-items: center;
}

.toolbar-separator {
    width: 1px;
    height: 20px;
    background: #dee2e6;
    margin: 0 5px;
}

.toolbar-button {
    background: white;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    padding: 6px 12px;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.2s ease;
    color: #495057;
}

.toolbar-button:hover {
    background: #667eea;
    color: white;
    border-color: #667eea;
}

.toolbar-button.active {
    background: #667eea;
    color: white;
    border-color: #667eea;
}

.toolbar-select {
    background: white;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    padding: 6px 8px;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.2s ease;
    color: #495057;
    min-width: 140px;
}

.toolbar-select:hover {
    border-color: #667eea;
}

.toolbar-select:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.1);
}

.word-count {
    font-size: 12px;
    color: #6c757d;
    margin-left: auto;
}

@media (max-width: 768px) {
    .editor-main {
        flex-direction: column;
    }

    .editor-sidebar {
        width: 100%;
        border-left: none;
        border-top: 1px solid #e9ecef;
    }

    .content-editor-wrapper {
        margin: 10px;
    }

    .editor-content, .editor-sidebar {
        padding: 20px;
    }

    .wmd-button-bar {
        padding: 8px 10px;
    }

    .wmd-input {
        padding: 15px;
        min-height: 300px;
    }
}

/* Modal Stilleri */
.modal {
    display: none;
    position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: rgba(0,0,0,0.5);
    backdrop-filter: blur(4px);
}

.modal.show {
    display: block !important;
}

.modal-dialog {
    position: relative;
    width: auto;
    margin: 1.75rem;
    pointer-events: none;
}

.modal-xl {
    max-width: 1140px;
}

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    outline: 0;
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 30px;
    border-bottom: 1px solid #e9ecef;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.modal-title {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

.modal-body {
    position: relative;
    flex: 1 1 auto;
    padding: 30px;
}

.close {
    background: none;
    border: none;
    font-size: 24px;
    font-weight: 700;
    line-height: 1;
    color: white;
    opacity: 0.8;
    cursor: pointer;
    padding: 0;
    margin: 0;
}

.close:hover {
    opacity: 1;
}

.modal-open {
    overflow: hidden;
}

/* Görsel galeri stilleri */
.img-container {
    max-height: 400px;
    overflow-y: auto;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 15px;
}

.the-img {
    width: 120px;
    height: 90px;
    object-fit: cover;
    border-radius: 6px;
    margin: 5px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.the-img:hover {
    border-color: #667eea;
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.the-img.selected {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
}

/* Responsive modal */
@media (max-width: 768px) {
    .modal-dialog {
        margin: 10px;
    }

    .modal-header, .modal-body {
        padding: 15px 20px;
    }

    .the-img {
        width: 80px;
        height: 60px;
        margin: 3px;
    }
}
</style>
<script>
$( function() {
    // Decode HTML entities
    function decodeHtml(html) {
      var txt = document.createElement("textarea");
      txt.innerHTML = html;
      return txt.value;
    }

    var availableTags = [
<?php foreach ($tags as $tag => $count):?>
    "<?php echo tag_i18n($tag) ?>",
<?php endforeach;?>
    ].map(decodeHtml); // Decoding all tags

    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }

    $( "#pTag" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === 9 && // 9 = tab
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );

// Zenginleştirilmiş WMD Editör Fonksiyonları
document.addEventListener('DOMContentLoaded', function() {
    const wmdInput = document.getElementById('wmd-input');
    const wmdPreview = document.getElementById('wmd-preview');
    const charCount = document.getElementById('char-count');
    const wordCountNum = document.getElementById('word-count-num');

    // Element varlık kontrolü
    if (!wmdInput) {
        console.warn('wmd-input elementi bulunamadı');
        return;
    }

    // Kelime ve karakter sayacı
    function updateWordCount() {
        if (!wmdInput || !charCount || !wordCountNum) return;

        const text = wmdInput.value;
        const chars = text.length;
        const words = text.trim() === '' ? 0 : text.trim().split(/\s+/).length;

        charCount.textContent = chars;
        wordCountNum.textContent = words;
    }

    // İlk yükleme
    updateWordCount();

    // Gerçek zamanlı güncelleme
    if (wmdInput) {
        wmdInput.addEventListener('input', updateWordCount);
        wmdInput.addEventListener('paste', function() {
            setTimeout(updateWordCount, 10);
        });
    }

    // Tablo ekleme
    const insertTableBtn = document.getElementById('insert-table');
    if (insertTableBtn) {
        insertTableBtn.addEventListener('click', function() {
            const table = `
| Başlık 1 | Başlık 2 | Başlık 3 |
|----------|----------|----------|
| Hücre 1  | Hücre 2  | Hücre 3  |
| Hücre 4  | Hücre 5  | Hücre 6  |
`;
            insertAtCursor(wmdInput, table);
        });
    }

    // Emoji ekleme
    const insertEmojiBtn = document.getElementById('insert-emoji');
    if (insertEmojiBtn) {
        insertEmojiBtn.addEventListener('click', function() {
            const emojis = ['😊', '👍', '❤️', '🎉', '🔥', '💡', '⭐', '✅', '❌', '⚠️', '📝', '📊', '🚀', '💪', '🎯'];
            const emoji = emojis[Math.floor(Math.random() * emojis.length)];
            insertAtCursor(wmdInput, emoji + ' ');
        });
    }

    // Tarih ekleme
    const insertDateBtn = document.getElementById('insert-date');
    if (insertDateBtn) {
        insertDateBtn.addEventListener('click', function() {
            const now = new Date();
            const date = now.toLocaleDateString('tr-TR', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            insertAtCursor(wmdInput, date);
        });
    }

    // Başlık formatı select box
    const headingSelector = document.getElementById('heading-selector');
    if (headingSelector) {
        headingSelector.addEventListener('change', function() {
            const headingType = this.value;
            const selection = getSelectedText(wmdInput);

            if (headingType) {
                let prefix = '';
                let defaultText = 'Başlık Metni';

                switch(headingType) {
                    case 'h1':
                        prefix = '# ';
                        defaultText = 'Büyük Başlık';
                        break;
                    case 'h2':
                        prefix = '## ';
                        defaultText = 'Ana Başlık';
                        break;
                    case 'h3':
                        prefix = '### ';
                        defaultText = 'Alt Başlık';
                        break;
                    case 'h4':
                        prefix = '#### ';
                        defaultText = 'Küçük Başlık';
                        break;
                    case 'h5':
                        prefix = '##### ';
                        defaultText = 'Mini Başlık';
                        break;
                    case 'h6':
                        prefix = '###### ';
                        defaultText = 'Tiny Başlık';
                        break;
                }

                if (selection) {
                    // Seçili metin varsa, onu başlık yap
                    const formatted = prefix + selection;
                    replaceSelection(wmdInput, formatted);
                } else {
                    // Seçili metin yoksa, varsayılan başlık ekle
                    insertAtCursor(wmdInput, prefix + defaultText);
                }

                // Select box'ı sıfırla
                this.value = '';
            }
        });
    }

    // Metin formatı select box
    const formatSelector = document.getElementById('format-selector');
    if (formatSelector) {
        formatSelector.addEventListener('change', function() {
            const formatType = this.value;
            const selection = getSelectedText(wmdInput);

            if (formatType) {
                let prefix = '';
                let suffix = '';
                let defaultText = 'metin';

                switch(formatType) {
                    case 'bold':
                        prefix = '**';
                        suffix = '**';
                        defaultText = 'kalın metin';
                        break;
                    case 'italic':
                        prefix = '*';
                        suffix = '*';
                        defaultText = 'italik metin';
                        break;
                    case 'code':
                        prefix = '`';
                        suffix = '`';
                        defaultText = 'kod metni';
                        break;
                    case 'strikethrough':
                        prefix = '~~';
                        suffix = '~~';
                        defaultText = 'üstü çizili metin';
                        break;
                    case 'highlight':
                        prefix = '==';
                        suffix = '==';
                        defaultText = 'vurgulu metin';
                        break;
                }

                if (selection) {
                    // Seçili metin varsa, onu formatla
                    const formatted = prefix + selection + suffix;
                    replaceSelection(wmdInput, formatted);
                } else {
                    // Seçili metin yoksa, varsayılan metin ekle
                    const formatted = prefix + defaultText + suffix;
                    insertAtCursor(wmdInput, formatted);
                }

                // Select box'ı sıfırla
                this.value = '';
            }
        });
    }

    // Dikkat kutusu
    const formatCalloutBtn = document.getElementById('format-callout');
    if (formatCalloutBtn) {
        formatCalloutBtn.addEventListener('click', function() {
            const callout = `
> ⚠️ **Dikkat!**
>
> Bu önemli bir bilgidir. Lütfen dikkatli okuyun.
`;
            insertAtCursor(wmdInput, callout);
        });
    }

    // Bilgi kutusu
    const formatInfoBtn = document.getElementById('format-info');
    if (formatInfoBtn) {
        formatInfoBtn.addEventListener('click', function() {
            const info = `
> 💡 **Bilgi**
>
> Faydalı bir ipucu veya bilgi buraya yazılır.
`;
            insertAtCursor(wmdInput, info);
        });
    }

    // Önizleme toggle
    let previewVisible = false;
    const togglePreviewBtn = document.getElementById('toggle-preview');
    if (togglePreviewBtn && wmdPreview) {
        togglePreviewBtn.addEventListener('click', function() {
            if (previewVisible) {
                wmdPreview.style.display = 'none';
                this.innerHTML = '<i class="fa fa-eye"></i> Önizleme';
                if (this.classList) this.classList.remove('active');
                previewVisible = false;
            } else {
                wmdPreview.style.display = 'block';
                this.innerHTML = '<i class="fa fa-eye-slash"></i> Önizleme';
                if (this.classList) this.classList.add('active');
                previewVisible = true;
            }
        });
    }

    // Tam ekran toggle
    let isFullscreen = false;
    const toggleFullscreenBtn = document.getElementById('toggle-fullscreen');
    if (toggleFullscreenBtn) {
        toggleFullscreenBtn.addEventListener('click', function() {
            const editorWrapper = document.querySelector('.content-editor-wrapper');
            const editorSidebar = document.querySelector('.editor-sidebar');

            if (!editorWrapper) return;

            if (!isFullscreen) {
                editorWrapper.style.position = 'fixed';
                editorWrapper.style.top = '0';
                editorWrapper.style.left = '0';
                editorWrapper.style.width = '100vw';
                editorWrapper.style.height = '100vh';
                editorWrapper.style.zIndex = '9999';
                editorWrapper.style.margin = '0';

                // Sidebar'ı gizle
                if (editorSidebar) editorSidebar.style.display = 'none';

                this.innerHTML = '<i class="fa fa-compress"></i> Çık';
                if (this.classList) this.classList.add('active');
                isFullscreen = true;
            } else {
                editorWrapper.style.position = '';
                editorWrapper.style.top = '';
                editorWrapper.style.left = '';
                editorWrapper.style.width = '';
                editorWrapper.style.height = '';
                editorWrapper.style.zIndex = '';
                editorWrapper.style.margin = '';

                // Sidebar'ı göster
                if (editorSidebar) editorSidebar.style.display = 'block';

                this.innerHTML = '<i class="fa fa-expand"></i> Tam Ekran';
                if (this.classList) this.classList.remove('active');
                isFullscreen = false;
            }
        });
    }

    // Görsel seçim önizlemesi
    const imageInput = document.getElementById('pImage');
    const imagePreview = document.getElementById('imagePreview');

    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', function() {
            const imageUrl = this.value;
            if (imageUrl) {
                imagePreview.innerHTML = '<img src="' + imageUrl + '" alt="Seçilen görsel" style="max-width: 100%; border-radius: 6px;">';
            }
        });
    }

    // Modal görsel seçim sistemi
    const insertButton = document.getElementById('insertButton');
    const insertMediaDialog = document.getElementById('insertMediaDialog');
    const insertMediaDialogClose = document.getElementById('insertMediaDialogClose');
    const insertMediaDialogCancel = document.getElementById('insertMediaDialogCancel');
    const insertMediaDialogInsert = document.getElementById('insertMediaDialogInsert');
    const insertMediaDialogURL = document.getElementById('insertMediaDialogURL');
    const insertImageDialogURL = document.getElementById('insertImageDialogURL');

    console.log('Modal elements found:');
    console.log('insertMediaDialogURL:', insertMediaDialogURL);
    console.log('insertImageDialogURL:', insertImageDialogURL);

    // Modal açma
    if (insertButton && insertMediaDialog) {
        insertButton.addEventListener('click', function() {
            // jQuery modal event'lerini engelle
            if (typeof $ !== 'undefined') {
                $(insertMediaDialog).off('hide.bs.modal');
                $(insertMediaDialog).off('hidden.bs.modal');
            }

            // Önce modal'ı görünür yap
            insertMediaDialog.style.display = 'block';
            insertMediaDialog.classList.add('show');
            document.body.classList.add('modal-open');

            // Sonra ARIA özelliklerini ayarla
            setTimeout(() => {
                insertMediaDialog.removeAttribute('aria-hidden');
                insertMediaDialog.setAttribute('aria-modal', 'true');

                // Focus'u modal içine taşı
                const focusableElements = insertMediaDialog.querySelectorAll('button:not([disabled]), input:not([disabled]), textarea:not([disabled]), select:not([disabled]), a[href]');
                if (focusableElements.length > 0) {
                    focusableElements[0].focus();
                }
            }, 100);

            // URL alanlarını temizle (sadece modal açılırken değil, kapatılırken)
            // Bu kısmı kaldırıyoruz çünkü modal açılırken URL'leri temizlememeli

            // Galeri içeriğini yeniden yükle
            if (typeof loadImages === 'function') {
                loadImages(1);
            }

            // Mevcut galeri görsellerine event listener ekle
            setTimeout(() => {
                const galleryImages = insertMediaDialog.querySelectorAll('img');
                console.log('Found gallery images:', galleryImages.length);

                galleryImages.forEach(img => {
                    img.style.cursor = 'pointer';
                    img.classList.add('gallery-image');

                    // Hover efekti ekle
                    img.addEventListener('mouseenter', function() {
                        this.style.opacity = '0.8';
                        this.style.transform = 'scale(1.05)';
                    });

                    img.addEventListener('mouseleave', function() {
                        this.style.opacity = '1';
                        this.style.transform = 'scale(1)';
                    });
                });
            }, 200);
        });
    }

    // Modal kapatma fonksiyonu
    function closeModal(clearURLs = true) {
        if (insertMediaDialog) {
            // Önce focus'u taşı
            if (insertButton) insertButton.focus();

            // Sonra modal'ı kapat
            setTimeout(() => {
                insertMediaDialog.style.display = 'none';
                insertMediaDialog.classList.remove('show');
                insertMediaDialog.setAttribute('aria-hidden', 'true');
                insertMediaDialog.removeAttribute('aria-modal');
                document.body.classList.remove('modal-open');

                // Seçili görseli temizle
                document.querySelectorAll('.the-img.selected').forEach(img => {
                    img.classList.remove('selected');
                });

                // URL alanlarını temizle (sadece iptal durumunda)
                if (clearURLs) {
                    if (insertMediaDialogURL) {
                        insertMediaDialogURL.value = '';
                    }
                    if (insertImageDialogURL) {
                        insertImageDialogURL.value = '';
                    }
                    console.log('Modal closed with URL clearing');
                } else {
                    console.log('Modal closed without URL clearing');
                }
            }, 50);
        }
    }

    // Modal kapatma event'leri
    if (insertMediaDialogClose) {
        insertMediaDialogClose.addEventListener('click', closeModal);
    }

    if (insertMediaDialogCancel) {
        insertMediaDialogCancel.addEventListener('click', closeModal);
    }

    // Modal dışına tıklama ile kapatma
    if (insertMediaDialog) {
        insertMediaDialog.addEventListener('click', function(e) {
            if (e.target === insertMediaDialog) {
                closeModal();
            }
        });
    }

    // ESC tuşu ile kapatma
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && insertMediaDialog && insertMediaDialog.classList.contains('show')) {
            closeModal();
        }
    });

    // Görsel ekleme
    if (insertMediaDialogInsert && imageInput) {
        // Önce mevcut event listener'ları temizle
        insertMediaDialogInsert.replaceWith(insertMediaDialogInsert.cloneNode(true));
        // Yeni referansı al
        const newInsertButton = document.getElementById('insertMediaDialogInsert');

        newInsertButton.addEventListener('click', function(e) {
            // Diğer event'leri engelle
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            // Her iki URL input'unu da kontrol et
            let imageUrl = '';
            if (insertMediaDialogURL && insertMediaDialogURL.value.trim()) {
                imageUrl = insertMediaDialogURL.value.trim();
            } else if (insertImageDialogURL && insertImageDialogURL.value.trim()) {
                imageUrl = insertImageDialogURL.value.trim();
            }

            console.log('Insert button clicked');
            console.log('insertMediaDialogURL value:', insertMediaDialogURL ? insertMediaDialogURL.value : 'null');
            console.log('insertImageDialogURL value:', insertImageDialogURL ? insertImageDialogURL.value : 'null');
            console.log('Final imageUrl:', imageUrl);

            if (imageUrl && imageUrl.length > 0) {
                imageInput.value = imageUrl;

                // Önizlemeyi güncelle
                if (imagePreview) {
                    imagePreview.innerHTML = '<img src="' + imageUrl + '" alt="Seçilen görsel" style="max-width: 100%; border-radius: 6px;">';
                }

                // Form validation'ı temizle
                imageInput.classList.remove('error');
                if (imageInput.parentElement) {
                    const errorMsg = imageInput.parentElement.querySelector('.error-message');
                    if (errorMsg) errorMsg.remove();
                }

                // Change ve input event'lerini tetikle
                imageInput.dispatchEvent(new Event('change', { bubbles: true }));
                imageInput.dispatchEvent(new Event('input', { bubbles: true }));

                // Modal'ı kapat (URL'leri koruyarak)
                closeModal(false);

                // Başarı mesajı göster
                showSuccessMessage('Görsel başarıyla eklendi!');
            } else {
                // URL boşsa uyarı ver
                console.log('No URL provided');
                showErrorMessage('Lütfen bir görsel seçin veya URL girin!');
            }

            // Event'in varsayılan davranışını engelle
            return false;
        });
    }

    // Manuel URL girişi için event listener
    if (insertMediaDialogURL) {
        insertMediaDialogURL.addEventListener('input', function() {
            console.log('insertMediaDialogURL input changed:', this.value);
            // Diğer input'u da senkronize et
            if (insertImageDialogURL) {
                insertImageDialogURL.value = this.value;
            }
        });

        insertMediaDialogURL.addEventListener('paste', function() {
            setTimeout(() => {
                console.log('insertMediaDialogURL pasted:', this.value);
                // Diğer input'u da senkronize et
                if (insertImageDialogURL) {
                    insertImageDialogURL.value = this.value;
                }
            }, 10);
        });
    }

    if (insertImageDialogURL) {
        insertImageDialogURL.addEventListener('input', function() {
            console.log('insertImageDialogURL input changed:', this.value);
            // Diğer input'u da senkronize et
            if (insertMediaDialogURL) {
                insertMediaDialogURL.value = this.value;
            }
        });

        insertImageDialogURL.addEventListener('paste', function() {
            setTimeout(() => {
                console.log('insertImageDialogURL pasted:', this.value);
                // Diğer input'u da senkronize et
                if (insertMediaDialogURL) {
                    insertMediaDialogURL.value = this.value;
                }
            }, 10);
        });
    }

    // Galeri görsellerine tıklama (jQuery kodu yerine)
    document.addEventListener('click', function(e) {
        console.log('Clicked element:', e.target);
        console.log('Element classes:', e.target.className);
        console.log('Element tag:', e.target.tagName);

        // Galeri içindeki herhangi bir img elementini yakala
        const isGalleryImage = e.target.tagName === 'IMG' &&
                              (e.target.closest('.img-container') ||
                               e.target.closest('#gallery-1') ||
                               e.target.closest('#gallery-2') ||
                               e.target.classList.contains('gallery-image') ||
                               e.target.classList.contains('the-img'));

        if (isGalleryImage) {
            console.log('Image clicked, src:', e.target.getAttribute('src'));

            // Önceki seçimi temizle
            document.querySelectorAll('img.selected').forEach(img => {
                img.classList.remove('selected');
            });

            // Yeni seçimi işaretle
            e.target.classList.add('selected');

            const imageSrc = e.target.getAttribute('src');
            if (imageSrc) {
                // Her iki URL input'unu da güncelle
                if (insertMediaDialogURL) {
                    insertMediaDialogURL.value = imageSrc;
                    console.log('insertMediaDialogURL set to:', imageSrc);
                }
                if (insertImageDialogURL) {
                    insertImageDialogURL.value = imageSrc;
                    console.log('insertImageDialogURL set to:', imageSrc);
                }

                // Görsel feedback
                showSuccessMessage('Görsel seçildi!');
            }
        }
    });

    // Auto-slug generation
    const titleInput = document.getElementById('pTitle');
    const slugInput = document.getElementById('pURL');
    const aiTitleInput = document.getElementById('aiTitle');

    if (titleInput && slugInput) {
        titleInput.addEventListener('input', function() {
            // AI başlık alanını da senkronize et
            if (aiTitleInput && !aiTitleInput.value) {
                aiTitleInput.value = this.value;
            }

            if (!slugInput.value) {
                const slug = this.value
                    .toLowerCase()
                    .replace(/ğ/g, 'g')
                    .replace(/ü/g, 'u')
                    .replace(/ş/g, 's')
                    .replace(/ı/g, 'i')
                    .replace(/ö/g, 'o')
                    .replace(/ç/g, 'c')
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');
                slugInput.value = slug;
            }
        });
    }

    // Europa AI SEO Oluşturucu
    const generateAISEOBtn = document.getElementById('generateAISEO');
    const aiSEOStatus = document.getElementById('aiSEOStatus');
    const seoTitleInput = document.getElementById('pSeoTitle');
    const metaDescInput = document.getElementById('pMeta');
    const analyzeBtn = document.getElementById('analyzeSEO');
    const seoScoreBox = document.getElementById('seoScoreBox');
    const seoScoreBadge = document.getElementById('seoScoreBadge');
    const seoSubscores = document.getElementById('seoSubscores');
    const seoNotes = document.getElementById('seoNotes');

    if (generateAISEOBtn) {
        generateAISEOBtn.addEventListener('click', function() {
            // Mevcut form alanlarından veri al
            const title = titleInput ? titleInput.value.trim() : '';
            const tagInput = document.getElementById('pTag');
            const keywords = tagInput ? tagInput.value.trim() : '';

            // Başlık kontrolü
            if (!title) {
                showErrorMessage('Lütfen önce başlık alanını doldurun!');
                titleInput.focus();
                return;
            }

            // Etiket kontrolü
            if (!keywords) {
                showErrorMessage('Lütfen etiket alanını doldurun! (anahtar kelimeler)');
                if (tagInput) tagInput.focus();
                return;
            }

            // Loading durumu göster
            this.disabled = true;
            this.innerHTML = '<i class="fa fa-spinner fa-spin"></i> ChatGPT ile SEO oluşturuluyor...';
            if (aiSEOStatus) aiSEOStatus.style.display = 'block';

            // AI SEO oluşturma isteği
            generateEuropaSEO(title, keywords)
                .then(result => {
                    if (!result) {
                        showErrorMessage('SEO oluşturulamadı. API ayarlarını kontrol edin.');
                        return;
                    }

                    // Eğer endpoint içerik dönüyorsa, burada SEO çıkarımı yapılmaz; yalnızca SEO alanlarına yazılacak şekilde bekleniyor
                    // result bir string ise eski içerik endpoint'inden dönüyor olabilir.
                    if (typeof result === 'object' && (result.seo_title || result.meta_description)) {
                        if (seoTitleInput && result.seo_title) seoTitleInput.value = result.seo_title;
                        if (metaDescInput && result.meta_description) metaDescInput.value = result.meta_description;
                        showSuccessMessage('🎉 AI SEO başarıyla oluşturuldu!');

                        // Eğer SEO puanı da geldiyse kutuyu doldur
                        if (result.seo_score && seoScoreBox) {
                            const total = result.seo_score.score || 0;
                            const subs = result.seo_score.subscores || {};
                            const notes = result.seo_score.notes || [];
                            if (seoScoreBadge) {
                                seoScoreBadge.textContent = total;
                                seoScoreBadge.className = 'badge ' + (total >= 80 ? 'badge-success' : total >= 60 ? 'badge-warning' : 'badge-danger');
                            }
                            if (seoSubscores) {
                                seoSubscores.innerHTML = `
                                    <div>Başlık: <strong>${subs.title ?? 0}</strong> / 25</div>
                                    <div>Açıklama: <strong>${subs.description ?? 0}</strong> / 25</div>
                                    <div>Anahtar Kelimeler: <strong>${subs.keywords ?? 0}</strong> / 25</div>
                                    <div>İçerik: <strong>${subs.content ?? 0}</strong> / 25</div>
                                `;
                            }
                            if (seoNotes) {
                                seoNotes.innerHTML = '';
                                notes.forEach(n => {
                                    const li = document.createElement('li');
                                    li.textContent = n;
                                    seoNotes.appendChild(li);
                                });
                            }
                            seoScoreBox.style.display = 'block';
                        }
                    } else if (typeof result === 'string') {
                        // Geçici: İçerikten başlık/özet çıkar ve alanlara yerleştir
                        const tmp = document.createElement('div');
                        tmp.innerHTML = result;
                        const h2 = tmp.querySelector('h2');
                        const text = tmp.textContent || '';
                        const summary = text.trim().replace(/\s+/g,' ').slice(0, 158);
                        if (seoTitleInput && h2 && h2.textContent) seoTitleInput.value = h2.textContent.trim().slice(0, 60);
                        if (metaDescInput) metaDescInput.value = summary;
                        showSuccessMessage('🎉 AI SEO alanları içerikten türetildi.');
                    } else {
                        showErrorMessage('Geçersiz AI yanıtı alındı.');
                    }
                })
                .catch(error => {
                    console.error('AI Content Generation Error:', error);
                    let errorMsg = 'İçerik oluşturulurken hata oluştu: ' + error.message;

                    if (error.message.includes('API')) {
                        errorMsg += ' ChatGPT API ayarlarını kontrol edin.';
                    }

                    showErrorMessage(errorMsg);
                })
                .finally(() => {
                    // Loading durumunu kaldır
                    this.disabled = false;
                    this.innerHTML = '<i class="fa fa-magic"></i> SEO Oluştur';
                    if (aiSEOStatus) aiSEOStatus.style.display = 'none';
                });
        });
    }

    // SEO Puanı Analizi
    if (analyzeBtn) {
        analyzeBtn.addEventListener('click', async function() {
            const title = titleInput ? titleInput.value.trim() : '';
            const description = metaDescInput ? metaDescInput.value.trim() : '';
            const tagInput = document.getElementById('pTag');
            const keywords = tagInput ? tagInput.value.trim() : '';
            const content = (document.getElementById('wmd-input') || {}).value || '';

            this.disabled = true;
            this.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Analiz ediliyor...';

            try {
                const resp = await fetch(base_path + 'admin/analyze-seo', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                    body: JSON.stringify({ title, description, keywords, content, csrf_token: '<?php echo get_csrf(); ?>' })
                });
                if (!resp.ok) throw new Error('HTTP ' + resp.status);
                const data = await resp.json();
                if (!data.success) throw new Error(data.error || 'Analiz başarısız');

                const score = data.score || {};
                const total = score.score ?? 0;
                const subs = score.subscores || {};
                const notes = score.notes || [];

                if (seoScoreBadge) seoScoreBadge.textContent = total;

                // Renk kodu
                if (seoScoreBadge) {
                    seoScoreBadge.className = 'badge ' + (total >= 80 ? 'badge-success' : total >= 60 ? 'badge-warning' : 'badge-danger');
                }

                if (seoSubscores) {
                    seoSubscores.innerHTML = `
                        <div>Başlık: <strong>${subs.title ?? 0}</strong> / 25</div>
                        <div>Açıklama: <strong>${subs.description ?? 0}</strong> / 25</div>
                        <div>Anahtar Kelimeler: <strong>${subs.keywords ?? 0}</strong> / 25</div>
                        <div>İçerik: <strong>${subs.content ?? 0}</strong> / 25</div>
                    `;
                }

                if (seoNotes) {
                    seoNotes.innerHTML = '';
                    notes.forEach(n => {
                        const li = document.createElement('li');
                        li.textContent = n;
                        seoNotes.appendChild(li);
                    });
                }

                if (seoScoreBox) seoScoreBox.style.display = 'block';
                showSuccessMessage('SEO analizi tamamlandı.');
            } catch (e) {
                showErrorMessage('SEO analizi başarısız: ' + e.message);
            } finally {
                this.disabled = false;
                this.innerHTML = '<i class="fas fa-chart-line"></i> SEO Puanını Analiz Et';
            }
        });
    }

    // Klavye kısayolları
    if (wmdInput) {
        wmdInput.addEventListener('keydown', function(e) {
            // Ctrl+B = Bold
            if (e.ctrlKey && e.key === 'b') {
                e.preventDefault();
                wrapSelection(this, '**', '**');
            }
            // Ctrl+I = Italic
            if (e.ctrlKey && e.key === 'i') {
                e.preventDefault();
                wrapSelection(this, '*', '*');
            }
            // Ctrl+K = Link
            if (e.ctrlKey && e.key === 'k') {
                e.preventDefault();
                const selection = getSelectedText(this);
                const link = selection ? `[${selection}](url)` : '[Link metni](url)';
                replaceSelection(this, link);
            }
            // Tab = Indent
            if (e.key === 'Tab') {
                e.preventDefault();
                insertAtCursor(this, '    ');
            }
        });
    }

    // Syntax highlighting kaldırıldı (güvenlik riski nedeniyle)
    // Basit kod bloku stilleri yeterli
});

// Europa AI SEO Oluşturma Fonksiyonu
async function generateEuropaSEO(title, keywords) {
    try {
        const response = await fetch(base_path + 'admin/generate-ai-seo', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                title: title,
                keywords: keywords,
                content: (document.getElementById('wmd-input') || {}).value || '',
                csrf_token: '<?php echo get_csrf(); ?>'
            })
        });

        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }

        const data = await response.json();

        if (data.success) {
            return { seo_title: data.seo_title, meta_description: data.meta_description, seo_score: data.seo_score };
        } else {
            throw new Error(data.error || 'SEO oluşturulamadı');
        }
    } catch (error) {
        console.error('AI Content Generation Error:', error);
        throw error;
    }
}

// Mesaj gösterme fonksiyonları
function showSuccessMessage(message) {
    const messageDiv = document.createElement('div');
    messageDiv.className = 'alert alert-success alert-dismissible fade show';
    messageDiv.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        max-width: 300px;
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 8px;
        padding: 12px 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    `;
    messageDiv.innerHTML = `
        <i class="fa fa-check-circle" style="margin-right: 8px;"></i>
        ${message}
        <button type="button" class="close" style="background: none; border: none; font-size: 18px; margin-left: 10px; opacity: 0.7;">×</button>
    `;

    document.body.appendChild(messageDiv);

    // Otomatik kapat
    setTimeout(() => {
        if (messageDiv.parentNode) {
            messageDiv.remove();
        }
    }, 3000);

    // Manuel kapat
    messageDiv.querySelector('.close').addEventListener('click', () => {
        messageDiv.remove();
    });
}

function showErrorMessage(message) {
    const messageDiv = document.createElement('div');
    messageDiv.className = 'alert alert-danger alert-dismissible fade show';
    messageDiv.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        max-width: 300px;
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 8px;
        padding: 12px 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    `;
    messageDiv.innerHTML = `
        <i class="fa fa-exclamation-triangle" style="margin-right: 8px;"></i>
        ${message}
        <button type="button" class="close" style="background: none; border: none; font-size: 18px; margin-left: 10px; opacity: 0.7;">×</button>
    `;

    document.body.appendChild(messageDiv);

    // Otomatik kapat
    setTimeout(() => {
        if (messageDiv.parentNode) {
            messageDiv.remove();
        }
    }, 5000);

    // Manuel kapat
    messageDiv.querySelector('.close').addEventListener('click', () => {
        messageDiv.remove();
    });
}

// Yardımcı fonksiyonlar
function insertAtCursor(textarea, text) {
    if (!textarea || typeof textarea.selectionStart === 'undefined') return;

    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const value = textarea.value;

    textarea.value = value.slice(0, start) + text + value.slice(end);
    textarea.selectionStart = textarea.selectionEnd = start + text.length;

    try {
        textarea.focus();
        // Trigger input event for word count update
        textarea.dispatchEvent(new Event('input'));
    } catch (e) {
        console.warn('Event dispatch failed:', e);
    }
}

function getSelectedText(textarea) {
    if (!textarea || typeof textarea.selectionStart === 'undefined') return '';

    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    return textarea.value.slice(start, end);
}

function replaceSelection(textarea, text) {
    if (!textarea || typeof textarea.selectionStart === 'undefined') return;

    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const value = textarea.value;

    textarea.value = value.slice(0, start) + text + value.slice(end);
    textarea.selectionStart = start;
    textarea.selectionEnd = start + text.length;

    try {
        textarea.focus();
        // Trigger input event for word count update
        textarea.dispatchEvent(new Event('input'));
    } catch (e) {
        console.warn('Event dispatch failed:', e);
    }
}

function wrapSelection(textarea, prefix, suffix) {
    if (!textarea || typeof textarea.selectionStart === 'undefined') return;

    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const selectedText = textarea.value.slice(start, end);
    const replacement = prefix + selectedText + suffix;

    replaceSelection(textarea, replacement);
}
</script>

<div class="modern-admin-container">
    <div class="container-fluid">
<?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
<?php } ?>
<div class="notice error" id="response-error"></div>
<div class="notice" id="response"></div>

        <div class="content-editor-wrapper">


        <form method="POST">
                <div class="row">
                    <!-- Ana İçerik Alanı (Sol Taraf) -->
                    <div class="col-lg-8">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i> İçerik Editörü
                                </h3>
                            </div>
                            <div class="card-body">
                        <!-- Başlık Alanı -->
                                <div class="form-group">
                                    <label for="pTitle" class="form-label">
                                        <i class="fas fa-heading text-primary"></i> İçerik Başlığı
                                        <span class="text-danger">*</span>
                                    </label>
                        <input autofocus type="text"
                                           class="form-control form-control-lg <?php if (isset($postTitle)) { if (empty($postTitle)) { echo 'is-invalid';}} ?>"
                               id="pTitle"
                               name="title"
                               value="<?php if (isset($postTitle)) { echo $postTitle;} ?>"
                               placeholder="Yazınızın başlığını buraya yazın..."/>
                                    <?php if (isset($postTitle) && empty($postTitle)): ?>
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle"></i> Başlık alanı zorunludur
                                    </div>
                                    <?php endif; ?>
                                </div>

                        <!-- İçerik Editörü -->
                        <div class="content-editor-section">
                            <label for="content-editor" style="font-size: 16px; font-weight: 600; margin-bottom: 15px; display: block;">
                                <i class="fa fa-file-text"></i> İçerik <span class="required-badge">*</span>
                            </label>

                            <!-- Zenginleştirilmiş Markdown Editör -->
                            <div id="enhanced-markdown-editor">
                                <!-- Ana WMD Toolbar -->
                                <div id="wmd-button-bar" class="wmd-button-bar"></div>

                                <!-- Ek Araçlar Toolbar -->
                                <div class="editor-toolbar-extra">
                                    <div class="toolbar-group">
                                        <button type="button" class="toolbar-button" id="insert-table" title="Tablo Ekle">
                                            <i class="fa fa-table"></i> Tablo
                                        </button>
                                        <button type="button" class="toolbar-button" id="insert-emoji" title="Emoji Ekle">
                                            <i class="fa fa-smile-o"></i> Emoji
                                        </button>
                                        <button type="button" class="toolbar-button" id="insert-date" title="Tarih Ekle">
                                            <i class="fa fa-calendar"></i> Tarih
                                        </button>
                                    </div>

                                    <div class="toolbar-separator"></div>

                                    <div class="toolbar-group">
                                        <select id="heading-selector" class="toolbar-select" title="Başlık Formatı">
                                            <option value="">📝 Başlık Seç</option>
                                            <option value="h1"># Büyük Başlık (H1)</option>
                                            <option value="h2">## Ana Başlık (H2)</option>
                                            <option value="h3">### Alt Başlık (H3)</option>
                                            <option value="h4">#### Küçük Başlık (H4)</option>
                                            <option value="h5">##### Mini Başlık (H5)</option>
                                            <option value="h6">###### Tiny Başlık (H6)</option>
                                        </select>

                                        <select id="format-selector" class="toolbar-select" title="Metin Formatı">
                                            <option value="">🎨 Format Seç</option>
                                            <option value="bold">**Kalın Metin**</option>
                                            <option value="italic">*İtalik Metin*</option>
                                            <option value="code">`Kod Metni`</option>
                                            <option value="strikethrough">~~Üstü Çizili~~</option>
                                            <option value="highlight">==Vurgulu Metin==</option>
                                        </select>
                                    </div>

                                    <div class="toolbar-separator"></div>

                                    <div class="toolbar-group">
                                        <button type="button" class="toolbar-button" id="format-callout" title="Dikkat Kutusu">
                                            <i class="fa fa-exclamation-triangle"></i> Dikkat
                                        </button>
                                        <button type="button" class="toolbar-button" id="format-info" title="Bilgi Kutusu">
                                            <i class="fa fa-info-circle"></i> Bilgi
                                        </button>
                                    </div>

                                    <div class="toolbar-separator"></div>

                                    <div class="toolbar-group">
                                        <button type="button" class="toolbar-button" id="toggle-preview" title="Önizleme Aç/Kapat">
                                            <i class="fa fa-eye"></i> Önizleme
                                        </button>
                                        <button type="button" class="toolbar-button" id="toggle-fullscreen" title="Tam Ekran">
                                            <i class="fa fa-expand"></i> Tam Ekran
                                        </button>
                                    </div>

                                    <div class="word-count" id="word-count">
                                        <span id="char-count">0</span> karakter, <span id="word-count-num">0</span> kelime
                                    </div>
                                </div>

                                <!-- Editör Textarea -->
                                <textarea id="wmd-input"
                                         class="form-control wmd-input <?php if (isset($postContent)) { if (empty($postContent)) { echo 'error'; } } ?>"
                                         name="content"
                                         cols="20"
                                         rows="20"
                                         placeholder="İçeriğinizi buraya yazın...

Markdown formatını kullanabilirsiniz:
# Büyük Başlık
## Orta Başlık
### Küçük Başlık

**Kalın metin** veya *italik metin*

- Liste öğesi 1
- Liste öğesi 2

[Link metni](http://example.com)

![Resim açıklaması](resim-url.jpg)

> Alıntı metni

```
Kod bloğu
```"><?php if (isset($postContent)) { echo $postContent;} ?></textarea>
                            </div>

                            <!-- Önizleme -->
                                <div id="wmd-preview" class="wmd-panel wmd-preview" style="margin-top: 20px; min-height: 200px; display: none;"></div>
                            </div>
                        </div>
</div>
                        <!-- SEO Ayarları (İçerik Editörünün Altında) -->
                        <div class="card card-success card-outline mt-3">
                            <div class="card-header" data-card-widget="collapse" style="cursor: pointer;">
                                <h3 class="card-title">
                                    <i class="fas fa-search-plus"></i> SEO Optimizasyonu
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="pSeoTitle" class="form-label">
                                                <i class="fas fa-heading text-primary"></i> SEO Title
                                                <small class="text-muted">(Arama motorları için özel başlık)</small>
                                            </label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="pSeoTitle"
                                                   name="seo_title"
                                                   value="<?php if (isset($p->seo_title)) { echo $p->seo_title;} ?>"
                                                   placeholder="Arama motorları için optimize edilmiş başlık..."/>
                                            <div class="form-text">
                                                <i class="fas fa-info-circle text-info"></i>
                                                Boş bırakırsanız normal başlık kullanılır. Önerilen: 50-60 karakter
                        </div>
                    </div>

                                        <div class="form-group">
                                            <label for="pMeta" class="form-label">
                                                <i class="fas fa-align-left text-info"></i> Meta Description
                                                <small class="text-muted">(Arama sonuçlarında görünecek açıklama)</small>
                                            </label>
                                            <textarea id="pMeta"
                                                     class="form-control"
                                                     name="description"
                                                     rows="3"
                                                     placeholder="Arama motorları için kısa ve çekici açıklama yazın..."><?php if (isset($p->description)) { echo $p->description;} ?></textarea>
                                            <div class="form-text">
                                                <i class="fas fa-info-circle text-info"></i>
                                                Önerilen: 150-160 karakter. Boş bırakırsanız içerikten otomatik oluşturulur
                                            </div>
                                            <div class="mt-2">
                                                <button type="button" id="analyzeSEO" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-chart-line"></i> SEO Puanını Analiz Et
                                                </button>
                                            </div>
                                            <div id="seoScoreBox" class="alert alert-light border mt-2" style="display:none;">
                                                <div style="display:flex;align-items:center;gap:10px;">
                                                    <div id="seoScoreBadge" class="badge badge-secondary" style="font-size:14px;">0</div>
                                                    <strong>SEO Puanı</strong>
                                                </div>
                                                <div class="mt-2" id="seoSubscores" style="font-size:13px;">
                                                    <!-- başlık/açıklama/anahtar kelime/içerik alt puanları -->
                                                </div>
                                                <ul id="seoNotes" class="mt-2 mb-0" style="padding-left:18px;font-size:12px;"></ul>
                                            </div>
                                        </div>
</div>
                                    <div class="col-md-4">
                                        <!-- AI SEO Oluşturucu -->
                                        <div class="card card-info card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-robot"></i> AI SEO Asistanı
                                                </h3>
                                            </div>
                                            <div class="card-body text-center">
                                                <button type="button"
                                                        id="generateAISEO"
                                                        class="btn btn-info btn-block">
                                                    <i class="fas fa-magic"></i> SEO Oluştur
                                                </button>
                                                <div id="aiSEOStatus" class="mt-2" style="display: none;">
                                                    <div class="alert alert-warning p-2">
                                                        <i class="fas fa-spinner fa-spin"></i> AI çalışıyor...
                                                    </div>
                                                </div>
                                                <small class="text-muted mt-2 d-block">
                                                    Başlık ve etiketleri doldurun, AI size SEO oluşturacak
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar (Sağ Taraf) -->
                    <div class="col-lg-4">

                        <!-- Yayın Ayarları -->
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-cogs"></i> Yayın Ayarları
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pCategory" class="form-label">
                                        <i class="fas fa-folder text-warning"></i> Kategori
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="pCategory" class="form-control" name="category">
                        <?php foreach ($desc as $d):?>
                            <option value="<?php echo $d->slug;?>"><?php echo $d->title;?></option>
                        <?php endforeach;?>
                    </select>
                                    <div class="form-text">
                                        <i class="fas fa-info-circle text-info"></i>
                                        İçeriğinizin kategorisini seçin
                                    </div>
                </div>

                                <div class="form-group">
                                    <label for="pTag" class="form-label">
                                        <i class="fas fa-tags text-success"></i> Etiketler
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php if (isset($postTag)) { if (empty($postTag)) { echo 'is-invalid';}} ?>"
                                           id="pTag"
                                           name="tag"
                                           value="<?php if (isset($postTag)) { echo $postTag; } ?>"
                                           placeholder="Virgülle ayırarak yazın..."
                                           data-toggle="tooltip"
                                           title="Virgülle ayırarak etiketler ekleyin"/>
                                    <div class="form-text">
                                        <i class="fas fa-info-circle text-info"></i>
                                        Örnek: depolama, ankara, güvenlik
                                    </div>
                                    <?php if (isset($postTag) && empty($postTag)): ?>
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-triangle"></i> En az bir etiket eklemelisiniz
                                    </div>
                                    <?php endif; ?>
                                </div>
                        </div>
                        </div>

                            <div class="form-group-modern">
                                <div style="display: flex; gap: 10px;">
                                    <div style="flex: 1;">
                                        <label for="pDate">Tarih</label>
                                        <input type="date" id="pDate" name="date" class="form-control-modern" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                                    <div style="flex: 1;">
                                        <label for="pTime">Saat</label>
                                        <input step="1" type="time" id="pTime" name="time" class="form-control-modern" value="<?php echo date('H:i:s'); ?>">
                                    </div>
                                </div>
                                <div class="info-text">Gelecek tarih seçerseniz yazı zamanlanır</div>
                            </div>

                            <div class="form-group-modern">
                                <label for="pURL">URL Slug</label>
                                <input type="text"
                                       class="form-control-modern"
                                       id="pURL"
                                       name="url"
                                       value="<?php if (isset($postUrl)) { echo $postUrl;} ?>"
                                       placeholder="otomatik-olusturulacak"/>
                                <div class="info-text">Boş bırakırsanız başlıktan otomatik oluşturulur</div>
                        </div>



                        <!-- Medya Ayarları -->
                        <?php if ($type == 'is_image' || $type == 'is_video' || $type == 'is_audio' || $type == 'is_quote' || $type == 'is_link'):?>
                        <div class="sidebar-section">
                            <h4><i class="fa fa-image"></i> Medya Ayarları</h4>

                            <?php if ($type == 'is_image'):?>
                            <div class="form-group-modern">
                                <label for="pImage">Öne Çıkan Görsel <span class="required-badge">*</span></label>
                                <button type="button" id="insertButton" class="btn-modern btn-primary-modern" style="width: 100%; margin-bottom: 10px;">
                                    <i class="fa fa-upload"></i> Görsel Seç
                                </button>
                                <div class="media-preview" id="imagePreview" style="cursor: pointer;" onclick="document.getElementById('insertButton').click();">
                                    <?php if (isset($postImage) && !empty($postImage)): ?>
                                        <img id="imgFile" src="<?php echo $postImage; ?>" alt="Seçilen görsel"/>
                                    <?php else: ?>
                                        <i class="fa fa-image" style="font-size: 48px; color: #dee2e6; margin-bottom: 10px;"></i>
                                        <p style="margin: 0; color: #6c757d;">Görsel seçmek için tıklayın</p>
                                    <?php endif; ?>
                                </div>
                                <input type="text" class="form-control-modern" id="pImage" name="image" readonly value="<?php if (isset($postImage)) { echo $postImage;} ?>" style="margin-top: 10px;">
                                <input type="hidden" name="is_image" value="is_image">
                            </div>
                    <?php endif;?>

                    <?php if ($type == 'is_video'):?>
                            <div class="form-group-modern">
                                <label for="pVideo">Video URL <span class="required-badge">*</span></label>
                                <textarea class="form-control-modern" id="pVideo" name="video" rows="3" placeholder="YouTube, Vimeo vb. video URL'si..."><?php if (isset($postVideo)) { echo $postVideo;} ?></textarea>
                                <div class="info-text">YouTube veya Vimeo video linkini yapıştırın</div>
                    <input type="hidden" name="is_video" value="is_video">
                            </div>
                    <?php endif;?>

                            <?php if ($type == 'is_audio'):?>
                            <div class="form-group-modern">
                                <label for="pAudio">Ses Dosyası URL <span class="required-badge">*</span></label>
                                <textarea class="form-control-modern" id="pAudio" name="audio" rows="3" placeholder="SoundCloud, Spotify vb. ses URL'si..."><?php if (isset($postAudio)) { echo $postAudio;} ?></textarea>
                                <div class="info-text">SoundCloud veya diğer ses platformu linkini yapıştırın</div>
                                <input type="hidden" name="is_audio" value="is_audio">
                            </div>
                    <?php endif;?>

                    <?php if ($type == 'is_quote'):?>
                            <div class="form-group-modern">
                                <label for="pQuote">Alıntı Metni <span class="required-badge">*</span></label>
                                <textarea class="form-control-modern" id="pQuote" name="quote" rows="4" placeholder="Alıntı metnini buraya yazın..."><?php if (isset($postQuote)) { echo $postQuote;} ?></textarea>
                                <div class="info-text">Paylaşmak istediğiniz alıntı veya söz</div>
                    <input type="hidden" name="is_quote" value="is_quote">
                            </div>
                    <?php endif;?>

                    <?php if ($type == 'is_link'):?>
                            <div class="form-group-modern">
                                <label for="pLink">Bağlantı URL <span class="required-badge">*</span></label>
                                <textarea class="form-control-modern" id="pLink" name="link" rows="2" placeholder="https://example.com"><?php if (isset($postLink)) { echo $postLink;} ?></textarea>
                                <div class="info-text">Paylaşmak istediğiniz web sitesi adresi</div>
                    <input type="hidden" name="is_link" value="is_link">
                            </div>
                    <?php endif;?>
                </div>
                        <?php endif;?>

                        <!-- Özel Alanlar -->
                        <?php if(!empty($fields)):?>
                        <div class="sidebar-section">
                            <h4><i class="fa fa-plus-circle"></i> Özel Alanlar</h4>
                                <?php foreach ($fields as $fld):?>
                                <div class="form-group-modern">
                                    <?php if ($fld->type == 'text'):?>
                                    <label><?php echo $fld->label;?></label>
                                    <input type="<?php echo $fld->type;?>" placeholder="<?php echo $fld->info;?>" class="form-control-modern" id="<?php echo $fld->name;?>" name="<?php echo $fld->name;?>" value=""/>
                                    <?php elseif ($fld->type == 'textarea'):?>
                                    <label><?php echo $fld->label;?></label>
                                    <textarea class="form-control-modern" id="<?php echo $fld->name;?>" rows="3" placeholder="<?php echo $fld->info;?>" name="<?php echo $fld->name;?>"></textarea>
                                    <?php elseif ($fld->type == 'checkbox'):?>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                    <input type="<?php echo $fld->type;?>" id="<?php echo $fld->name;?>" name="<?php echo $fld->name;?>" >
                                        <label for="<?php echo $fld->name;?>" style="margin: 0;"><?php echo $fld->label;?></label>
                                    </div>
                                    <div class="info-text"><?php echo $fld->info;?></div>
                                    <?php elseif ($fld->type == 'select'):?>
                                    <label for="<?php echo $fld->name;?>"><?php echo $fld->label;?></label>
                                    <select id="<?php echo $fld->name;?>" class="form-control-modern" name="<?php echo $fld->name;?>">
                                    <?php foreach ($fld->options as $val):?>
                                        <option value="<?php echo $val->value;?>" ><?php echo $val->label;?></option>
                                    <?php endforeach;?>
                                    </select>
                                    <div class="info-text"><?php echo $fld->info;?></div>
                                    <?php endif;?>
                                </div>
                                <?php endforeach;?>
                            </div>
                        <?php endif;?>
                    </div>
                </div>

                <!-- Alt Butonlar -->
                    </div>

                    <!-- Form Butonları -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card card-secondary card-outline">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                    <div>
                                            <button type="button" id="preview-toggle" class="btn btn-outline-info">
                                                <i class="fas fa-eye"></i> Önizleme
                        </button>
                </div>
                                        <div>
                                            <button type="submit" name="draft" class="btn btn-outline-secondary mr-2">
                                                <i class="fas fa-save"></i> Taslak Kaydet
                                            </button>
                                            <button type="submit" name="publish" class="btn btn-primary">
                                                <i class="fas fa-paper-plane"></i> Yayınla
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
                </div>

                <!-- Hidden Fields -->
                <?php if ($type == 'is_post'):?>
                <input type="hidden" name="is_post" value="is_post">
                <?php endif;?>
                <input id="oldfile" type="hidden" name="oldfile" class="text"/>
                <input type="hidden" id="pType" name="posttype" value="<?php echo $type; ?>">
                <input type="hidden" name="csrf_token" value="<?php echo get_csrf() ?>">
                </div>
        </form>
        </div>
    </div>
    </div>

<style>
.wmd-prompt-background {z-index:10!important;}
#wmd-preview img {max-width:100%;}
.cover-container {
    overflow: auto;
    max-height: 65vh;
    width: 100%;
    white-space: nowrap;
}
.cover-item {
    position: relative;
    margin: 2px 2px;
    border-top-right-radius: 2px;
    width: 190px;
    height: 140px;
    vertical-align: top;
    background-position: top left;
    background-repeat: no-repeat;
    background-size: cover;
    float:left;
}
</style>

    <div class="modal fade" id="insertImageDialog" tabindex="-1" role="dialog" aria-labelledby="insertImageDialogTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="insertImageDialogTitle"><?php echo i18n('Insert_Image');?></p>
                    <button type="button" class="close" id="insertImageDialogClose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <div class="row-fluid img-container" id="gallery-1">
                                    <?php echo $images;?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="insertImageDialogURL">URL</label>
                                <textarea class="form-control" id="insertImageDialogURL" rows="5" placeholder="<?php echo i18n('Enter_image_URL');?>" ></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="insertImageDialogFile"><?php echo i18n('Upload');?></label>
                                <input type="file" class="form-control-file" name="file" id="insertImageDialogFile" accept="image/png,image/jpeg,image/gif, image/webp" />
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="insertImageDialogInsert"><?php echo i18n('Insert_Image');?></button>
                                <button type="button" class="btn btn-secondary"  id="insertImageDialogCancel" data-dismiss="modal"><?php echo i18n('Cancel');?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($type == 'is_image'):?>
    <div class="modal fade" id="insertMediaDialog" tabindex="-1" role="dialog" aria-labelledby="insertMediaDialogTitle">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="insertMediaDialogTitle"><?php echo i18n('Insert_Image');?></p>
                    <button type="button" class="close" id="insertMediaDialogClose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <div class="row-fluid img-container" id="gallery-2">
                                    <?php echo $images;?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="insertMediaDialogURL">URL</label>
                                <textarea class="form-control" id="insertMediaDialogURL" rows="5" placeholder="<?php echo i18n('Enter_image_URL');?>"></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="insertMediaDialogFile"><?php echo i18n('Upload');?></label>
                                <input type="file" class="form-control-file" name="file" id="insertMediaDialogFile" accept="image/png,image/jpeg,image/gif, image/webp" />
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="insertMediaDialogInsert"><?php echo i18n('Insert_Image');?></button>
                                <button type="button" class="btn btn-secondary"  id="insertMediaDialogCancel" data-dismiss="modal"><?php echo i18n('Cancel');?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>

</div>

<!-- Declare the base path. Important -->
<script type="text/javascript">
    var base_path = '<?php echo site_url() ?>';
    var initial_image = <?php echo json_encode($images); ?>;
    var parent_page = '';
    var addEdit = 'add';
    var saveInterval = 60000;
    const field = [<?php foreach ($fields as $f){ echo '"' . $f->name . '", ';}?>];
</script>
<script type="text/javascript" src="<?php echo site_url() ?>system/admin/editor/js/editor.js"></script>
<!-- <script type="text/javascript" src="<?php echo site_url() ?>system/resources/js/media.uploader.js"></script> -->
<!-- Eski media uploader devre dışı - yeni vanilla JS sistemi kullanılıyor -->
<script>
function loadImages(page) {
  if (typeof $ !== 'undefined') {
  $.ajax({
    url: '<?php echo site_url();?>admin/gallery',
    type: 'POST',
    data: { page: page },
    dataType: 'json',
      success: function(response) {
          if ($('#gallery-1').length) $('#gallery-1').html(response.images);
          if ($('#gallery-2').length) $('#gallery-2').html(response.images);
      }
  });
  }
}

// jQuery kodu kaldırıldı - vanilla JavaScript kullanılıyor
</script>
<script>
    // Eski layout için uyumluluk kodu
    function toggleDivs() {
        var div1 = document.getElementById('post-settings');
        var hideButton = document.getElementById('hideButton');

        if (div1) {
        if (div1.style.display === 'none') {
            div1.style.display = '';
                if (document.body.classList) {
            document.body.classList.add("sidebar-mini");
            document.body.classList.remove("sidebar-collapse");
                }
        } else {
            div1.style.display = 'none';
                if (document.body.classList) {
            document.body.classList.remove("sidebar-mini");
            document.body.classList.add("sidebar-collapse");
        }
    }
        }
    }

    // Güvenli event listener ekleme
    document.addEventListener('DOMContentLoaded', function() {
        var hideButton = document.getElementById('hideButton');
        if (hideButton) {
            hideButton.addEventListener('click', toggleDivs);
        }
    });
</script>
<?php if (config('autosave.enable') == 'true' ):?>
<script src="<?php echo site_url();?>system/resources/js/save_draft.js?v=1"></script>
<?php endif;?>


