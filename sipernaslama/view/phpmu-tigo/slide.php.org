    <script type="text/javascript" src="<?php echo "$f[folder]/"; ?>slide/js/jssor.js"></script>
    <script type="text/javascript" src="<?php echo "$f[folder]/"; ?>slide/js/jssor.slider.js"></script>
    <script type="text/javascript" src="<?php echo "$f[folder]/"; ?>slide/js/phpmu_jssor.js"></script>
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <div id="sliderb_container" style="position: relative; width: 630px; height: 300px; overflow: hidden; ">
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?php echo "$f[folder]/"; ?>slide/img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 630px; height: 330px;
            overflow: hidden;">
            <?php
                $terkini=mysqli_query($koneksi, "SELECT * FROM berita left join users on berita.username=users.username
                                                                        left join kategori on berita.id_kategori=kategori.id_kategori
                                                                            WHERE headline='Y' AND berita.status='Y' ORDER BY id_berita DESC LIMIT 5");
                while($t=mysqli_fetch_array($terkini)){ 
                    $komen1 = "SELECT * FROM komentar WHERE id_berita = '".$t['id_berita']."'";
                    $komentar1 = mysqli_query($koneksi, $komen1);
                    $total_komentar1 = mysqli_num_rows($komentar1);

                    if ($t[gambar] ==''){
                      echo "<div>
                                <div style='overflow:hidden; width:630px'><img style='width:630px' u=image src='foto_berita/no-image.jpg' />
                                <div u='thumb'><a style='color:#fff' href='berita-$t[judul_seo].html'>$t[judul]</a></div>
                            </div>";
                    }else{
                      echo "<div>
                                <img style='overflow:hidden; width:630px' u=image src='foto_berita/$t[gambar]' />
                                <div u='thumb'><a style='color:#fff' href='berita-$t[judul_seo].html'>$t[judul]</a></div>
                            </div>";
                    }
                }
            ?>
            

        </div>
        
        <div u="thumbnavigator" style="position: absolute; bottom: 0px; left: 0px; height:45px; width:630px;">
            <div style="filter: alpha(opacity=40); opacity:0.4; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
            <!-- Thumbnail Item Skin Begin -->
            <div u="slides">
                <div u="prototype" style="position: absolute; width: 630px; height: 45px; top: 0; left: 0;">
                    <div u="thumbnailtemplate" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; font-family: verdana; font-weight: normal; color:#fff; line-height: 45px; font-size:20px; padding-left:10px;"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!--#endregion ThumbnailNavigator Skin End -->
        
        <style>
            .jssorb01 {
                position: absolute;
            }
            .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
                position: absolute;
                /* size of bullet elment */
                width: 12px;
                height: 12px;
                filter: alpha(opacity=70);
                opacity: .7;
                overflow: hidden;
                cursor: pointer;
                border: #000 1px solid;
            }
            .jssorb01 div { background-color: gray; }
            .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
            .jssorb01 .av { background-color: #fff; }
            .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }
        </style>
        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb01" style="bottom: 16px; right: 10px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype"></div>
        </div>
        <style>
            .jssora05l, .jssora05r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 40px;
                cursor: pointer;
                background: url(../img/a17.png) no-repeat;
                overflow: hidden;
            }
            .jssora05l { background-position: -10px -40px; }
            .jssora05r { background-position: -70px -40px; }
            .jssora05l:hover { background-position: -130px -40px; }
            .jssora05r:hover { background-position: -190px -40px; }
            .jssora05l.jssora05ldn { background-position: -250px -40px; }
            .jssora05r.jssora05rdn { background-position: -310px -40px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora05l" style="top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora05r" style="top: 123px; right: 8px;">
        </span>
        <!-- Trigger -->
        <script>
            jssor_sliderb_starter('sliderb_container');
        </script>
    </div>