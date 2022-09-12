   <?php
   include "../config/library.php";
   include "../config/fungsi_combobox.php";
   include "../config/class_paging.php";

// Bagian Home
  if ($_GET['module']=='home'){
    include "view_home.php";
  }

  // Bagian Pasang Iklan
  elseif ($_GET['module']=='pasangiklan'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_pasangiklan/pasangiklan.php";
    }
  }

  // Bagian Pasang Iklan
  elseif ($_GET['module']=='iklantengah'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_iklantengah/iklantengah.php";
    }
  }

  // Bagian Pasang Iklan
  elseif ($_GET['module']=='iklanatas'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_iklanatas/iklanatas.php";
    }
  }

  // Bagian User
  elseif ($_GET['module']=='user'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'  OR $_SESSION['leveluser']=='kontributor'){
      include "modul/mod_users/users.php";
    }
  }

  // Bagian Modul
  elseif ($_GET['module']=='modul'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_modul/modul.php";
    }
  }

  // Bagian Kategori
  elseif ($_GET['module']=='kategori'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_kategori/kategori.php";
    }
  }

  // Bagian Berita
  elseif ($_GET['module']=='berita'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user' OR $_SESSION['leveluser']=='kontributor'){
      include "modul/mod_berita/berita.php";                            
    }
  }

  // Bagian Komentar Berita
  elseif ($_GET['module']=='komentar'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_komentar/komentar.php";
    }
  }

  // Bagian Tag
  elseif ($_GET['module']=='tag'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_tag/tag.php";
    }
  }

  // Bagian Agenda
  elseif ($_GET['module']=='agenda'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_agenda/agenda.php";
    }
  }

  // Bagian Banner
  elseif ($_GET['module']=='banner'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_banner/banner.php";
    }
  }

  // Bagian Poling
  elseif ($_GET['module']=='poling'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_poling/poling.php";
    }
  }

  // Bagian Alamat
  elseif ($_GET['module']=='alamat'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_alamat/alamat.php";
    }
  }

  // Bagian Download
  elseif ($_GET['module']=='download'){
      if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_download/download.php";
    }
  }

  // Bagian Hubungi Kami
  elseif ($_GET['module']=='hubungi'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_hubungi/hubungi.php";
    }
  }

  // Bagian Templates
  elseif ($_GET['module']=='templates'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_templates/templates.php";
    }
  }

  // Bagian Album
  elseif ($_GET['module']=='album'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_album/album.php";
    }
  }

  // Bagian Galeri Foto
  elseif ($_GET['module']=='galerifoto'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_galerifoto/galerifoto.php";
    }
  }

  // Bagian Kata Jelek
  elseif ($_GET['module']=='katajelek'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_katajelek/katajelek.php";
    }
  }

  // Bagian Sekilas Info
  elseif ($_GET['module']=='sekilasinfo'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_sekilasinfo/sekilasinfo.php";
    }
  }

  // Bagian Menu Utama
  elseif ($_GET['module']=='menu'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_menu/menu.php";
    }
  }


  // Bagian Halaman Statis
  elseif ($_GET['module']=='halamanstatis'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_halamanstatis/halamanstatis.php";
    }
  }

  // Bagian Sekilas Info
  elseif ($_GET['module']=='sekilasinfo'){
      if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_sekilasinfo/sekilasinfo.php";
    }
  }


  // Bagian YM
  elseif ($_GET['module']=='ym'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_ym/ym.php";
    }
  }


  // Bagian Logo
  elseif ($_GET['module']=='logo'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_logo/logo.php";
    }
  }

  // Bagian Playlist
  elseif ($_GET['module']=='playlist'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_playlist/playlist.php";
    }
  }

  // Bagian Video
  elseif ($_GET['module']=='video'){
      if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_video/video.php";
    }
  }

  // Bagian KomentarVideo 
  elseif ($_GET['module']=='komentarvid'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_komentarvid/komentarvid.php";
    }
  }

  // Bagian Tag Video
  elseif ($_GET['module']=='tagvid'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_tagvid/tagvid.php";
    }
  }

  // Bagian Identitas Website
  elseif ($_GET['module']=='identitas'){
     if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_identitas/identitas.php";
    }
  }

    // Bagian Background
  elseif ($_GET['module']=='background'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_background/background.php";
    }
  }   


// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}


?>