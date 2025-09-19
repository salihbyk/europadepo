# GitHub Kurulum Rehberi - Europa Depo

Bu rehber, Europa Depo otomatik güncelleme sistemini GitHub ile nasıl kuracağınızı açıklar.

## 🚀 Hızlı Başlangıç

### 1. GitHub Repository Oluşturun

1. [GitHub](https://github.com) hesabınızla giriş yapın
2. [Yeni repository oluştur](https://github.com/new) sayfasına gidin
3. Repository ayarları:
   - **Repository name**: `europadepo`
   - **Description**: `Europa Depo - Eşya Depolama Sistemi`
   - **Public** seçin (önemli!)
   - README ekleyin (isteğe bağlı)

### 2. Projeyi GitHub'a Yükleyin

#### Terminal/Command Line ile:
```bash
# Proje klasörüne gidin
cd C:\laragon\www\europadepo

# Git repository'si başlatın
git init

# Tüm dosyaları ekleyin
git add .

# İlk commit'i yapın
git commit -m "İlk commit - Europa Depo v1.0.0"

# GitHub repository'sini remote olarak ekleyin
git remote add origin https://github.com/salihbyk/europadepo.git

# Ana branch'i main olarak ayarlayın
git branch -M main

# GitHub'a push edin
git push -u origin main
```

#### GitHub Desktop ile:
1. [GitHub Desktop](https://desktop.github.com/) indirin ve kurun
2. "Add an Existing Repository from your Hard Drive" seçin
3. `C:\laragon\www\europadepo` klasörünü seçin
4. "Publish repository" butonuna tıklayın
5. Repository adını `europadepo` yapın ve Public seçin

### 3. İlk Release Oluşturun

1. GitHub'da repository'nize gidin: https://github.com/salihbyk/europadepo
2. **Releases** sekmesine tıklayın
3. **"Create a new release"** butonuna tıklayın
4. Release ayarları:
   - **Tag version**: `v1.0.0`
   - **Release title**: `Europa Depo v1.0.0`
   - **Description**:
     ```
     # Europa Depo v1.0.0 - İlk Versiyon

     ## Özellikler
     - HTMLy CMS entegrasyonu
     - Modern responsive tema
     - Otomatik güncelleme sistemi
     - Çoklu depolama türü desteği
     - Admin paneli entegrasyonu

     ## Kurulum
     1. ZIP dosyasını indirin
     2. Web sunucunuza çıkarın
     3. Config ayarlarını yapın
     4. Admin hesabı oluşturun
     ```
5. **"Publish release"** butonuna tıklayın

### 4. Otomatik Güncelleme Sistemini Test Edin

1. Europa Depo admin paneline gidin
2. **Europa Depo Güncelleme** bölümüne tıklayın
3. **"Güncelleme Kontrol Et"** butonuna tıklayın
4. Sistem artık GitHub'dan güncellemeleri kontrol edebilecek

## 🔧 Gelecekteki Güncellemeler

### Yeni Versiyon Yayınlama

1. **Kod değişikliklerini yapın**
2. **Git ile commit edin**:
   ```bash
   git add .
   git commit -m "Yeni özellikler eklendi"
   git push
   ```

3. **Release script'ini kullanın**:
   ```bash
   php scripts/release.php -v 1.1.0 -m "Yeni özellikler ve hata düzeltmeleri"
   ```

4. **GitHub'da release oluşturun**:
   - Releases → "Create a new release"
   - Tag: `v1.1.0`
   - Title: `Europa Depo v1.1.0`
   - Açıklama yazın
   - "Publish release"

### Otomatik Güncelleme

Kullanıcılar artık admin panelinden:
1. **Europa Depo Güncelleme** → **"Güncelleme Kontrol Et"**
2. Yeni versiyon varsa **"Güncellemeyi Başlat"**
3. Sistem otomatik olarak:
   - GitHub'dan son versiyonu indirir
   - Yedek oluşturur
   - Dosyaları günceller
   - Config'leri korur

## 📋 Kontrol Listesi

- [ ] GitHub hesabı oluşturuldu
- [ ] `europadepo` repository'si oluşturuldu (Public)
- [ ] Proje dosyaları GitHub'a yüklendi
- [ ] İlk release (`v1.0.0`) oluşturuldu
- [ ] Admin panelinde güncelleme sistemi test edildi
- [ ] Otomatik güncelleme çalışıyor

## 🔒 Güvenlik Notları

- Repository'yi **Public** yapın (GitHub API erişimi için gerekli)
- Config dosyaları `.gitignore` ile korunuyor
- Kullanıcı verileri GitHub'a yüklenmiyor
- Güncelleme sırasında config dosyaları korunuyor

## 🆘 Sorun Giderme

### "Repository bulunamadı" Hatası
- Repository adının doğru olduğundan emin olun: `europadepo`
- Repository'nin Public olduğundan emin olun
- GitHub kullanıcı adının doğru olduğundan emin olun: `salihbyk`

### "Release bulunamadı" Hatası
- En az bir release oluşturduğunuzdan emin olun
- Release'in Published olduğundan emin olun (Draft değil)

### API Erişim Hatası
- İnternet bağlantınızı kontrol edin
- GitHub sunucularının çalıştığını kontrol edin
- Firewall/Antivirus ayarlarını kontrol edin

---

**Destek**: Sorunlar için GitHub Issues kullanın: https://github.com/salihbyk/europadepo/issues
