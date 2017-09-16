<!-- cover homepage -->
<section class="hero is-has-backgound is-info is-medium">
<div class="hero-body">
<div class="container">
  <h1 class="title">
    Cari dan Temukan
  </h1>
  <h2 class="subtitle">
    Barang Anda Yang Hilang.
  </h2>
</div>
</div>
</section>

<!-- Recent Anouncements -->
<section class="section">
    <div class="container">
      	<h1 class="title">Baru Saja Ditemukan</h1>
      	<h2 class="subtitle">
        	Discover Barang baru ditemukan
      	</h2>
      	<div class="columns is-multiline" id="content-of-home">
      	
      	<!-- the content goes to here-->
		<?php
			foreach ($data as $d) {
		?>

			<div class="column is-one-quarter">
				<div class="card">
				  <div class="card-image">
				    <figure class="image is-4by3">
				      <img src='<?php echo site_url("images/generate/data_single/{$d->id_pengumuman}/1")?>' alt="Placeholder image">
				    </figure>
				  </div>
				  <div class="card-content">
				    <div class="media">
				      <div class="media-left">
				        <figure class="image sidebar-image">
				          <img src="<?php echo site_url("images/generate/user/{$d->username}")?>" alt="profil">
				        </figure>
				      </div>
				      <div class="media-content">
				        <p class="title is-5"><?php echo $d->nama_barang?></p>
				        <p class="subtitle is-6">
				        	found by:
				         	<?php 
				         		$nama = explode(' ', $d->nama_user);
				         		echo $nama[0];
				         	?>
				        </p>
				      </div>
				    </div>

				    <div class="content">
				      <div>
				      	<span class="fa fa-map-marker"> <?php echo $d->lokasi_barang?></span>
				      </div>
				      <time datetime="<?php echo $d->tgl_pengumuman?>">
				      	<span class="fa fa-calendar"> <?php echo readAbleDateTime($d->tgl_pengumuman)?></span>
				      </time>
				      <p class="has-text-justify">
				      	<?php echo substr($d->keterangan_barang, 0, 50)?>... 
				      	<br>
				      	<a data-judul = "<?php echo $d->judul_pengumuman?>"
				      	   data-penemu= "<?php echo $nama[0]?>"
				      	   data-lok= "<?php echo $d->lokasi_barang?>"
				      	   data-brg= "<?php echo $d->nama_barang?>"
				      	   data-tgl= "<?php echo readAbleDateTime($d->tgl_pengumuman)?>"
				      	   data-kontak="<?php echo $d->kontak_user?>"
				      	   data-fulltext="<?php echo $d->keterangan_barang?>" 
						   data-pic-1 = "<?php echo site_url("images/generate/data_single/{$d->id_pengumuman}/1")?>"
						   data-pic-2 = "<?php echo site_url("images/generate/data_single/{$d->id_pengumuman}/2")?>"
						   data-pic-3 = "<?php echo site_url("images/generate/data_single/{$d->id_pengumuman}/3")?>"
				      	   onclick="hoverit($(this));"> 
				      	   Read More
				      	</a>
				      </p>
				    </div>
				  </div>
				  <footer class="card-footer">
				    <a href="whatsapp://send?text=Hai, &phone=<?php echo $d->kontak_user;?>" class="card-footer-item">
				    	<i class="fa fa-whatsapp"> Kontak</i>
				    </a>
				    <a href="#" class="card-footer-item">
				    	<i class="fa fa-share"> Share</i>
				    </a>
				  </footer>
				</div>
			</div>

		<?php
			}
		?>
		  <!-- end of the content-->
		</div>
    </div>
</section>

<div id="readfull-modal" class="modal">
	<div class="modal-background"></div>
	<div class="modal-content">
		<div class="box">
		  <figure class="image columns">
		  		<div class="column is-one-third">
		  			<img id="detail-pic" src="" alt="pic">
		  		</div>
		  		<div class="column is-one-third">
		  			<img id="detail-pic-1" src="" alt="pic">
		  		</div>
		  		<div class="column is-one-third">
		  			<img id="detail-pic-2" src="" alt="pic">
		  		</div>
		  </figure>
	      <article class="media">
	        <div class="media-content">
	          <div class="content">
	          	<h4 class="title" id="detail-judul"></h4>
	          	<h6 class="subtitle" id="detail-sub"></h6>
				<div>
					<span id="detail-lok" class="fa fa-map-marker"></span>
				</div>
	          	<time>
	          		<span id="detail-tgl" class="fa fa-calendar"></span>
	          	</time>
	            <p id="text-full"></p>
	          </div>
	          <nav class="level">
	            <div class="level-left">
	              <a href="#" id="detail-wa" class="level-item">
	                <span class="icon is-medium"><i class="fa fa-whatsapp"></i></span>
	              </a>
	              <a href="#" id="detail-fb" class="level-item">
	                <span class="icon is-medium"><i class="fa fa-share"></i></span>
	              </a>
	            </div>
	          </nav>
	        </div>
	      </article>
	    </div>
	</div>
	<button class="modal-close is-large" aria-label="close" onclick="hoverit(null)"></button>
</div>

<script type="text/javascript">
	var register = "<?php echo $this->input->get('error')?>";
	var login 	 = "<?php echo $this->input->get('login')?>";
	$(document).ready(function () {
		if (register!="") {
			register_form();
			$('#register-modal').find('.modal-title').text(' Gagal Mendaftar');
		}

		if (login!="") {
			login_form();
			$('#login-modal').find('.modal-title').text(' Login Gagal');
		}
		getLocation();
	});

	function hoverit(event) {
		if (event != null) {
			$('#detail-pic').attr('src',event.data('pic-1'));
			$('#detail-pic-1').attr('src',event.data('pic-2'));
			$('#detail-pic-2').attr('src',event.data('pic-3'));
			$('#detail-judul').text(event.data('judul'));
			$('#detail-sub').text(event.data('brg'));
			$('#detail-lok').text(' '+event.data('lok'));
			$('#detail-tgl').text(' '+event.data('tgl'));
			$('#detail-wa').attr('href','whatsapp://send?text=Hai, &phone='+event.data('kontak'));
			$("#text-full").text(event.data('fulltext'));
		}

		$("#readfull-modal").toggleClass('is-active');
	}

	function getLocation() {
	    if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
	    } 
	}

	function showPosition(position) {
		var longlat = {lat:position.coords.latitude, long:position.coords.longitude};
	    console.log(longlat); 
	}
</script>