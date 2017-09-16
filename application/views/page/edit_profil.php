<style type="text/css">
	.sidebar-image img{
		width: 100px;
		height: 100px;
	}
</style>
<?php
	$kontak = substr($data['user']->kontak_user, 3);
?>
<br>
<section class="section container hero is-small is-has-backgound is-bold box">
  <div class="hero-body">
    <div class="container">
      	<div>
      		<article class="media">
	      		<figure class="media-left">
	      			<p class="image sidebar-image">
	      				<img id="preview" src="<?php echo site_url("images/generate/user/{$data['user']->username}");?>">
	      			</p>
	      		</figure>
	      		<div class="media-content">
	      			<div class="content">
	      				<h2 class="subtitle has-text-light">Profil Diri</h1>
	      				<h3 class="title has-text-light"><?php echo $data['user']->nama_user;?></h3>
	      				<h6 class="subtitle has-text-light">
	      					@<?php echo $data['user']->username?>
	      				</h6>
	      			</div>
	      		</div>
	      	</article>
      	</div>
    </div>
  </div>
</section>
<section class="section">
<div class="container">
	<div class="content">
	<form action="<?php echo site_url('page/profil/save_profil');?>" method="POST" enctype="multipart/form-data">
		<div class="columns">
			<div class="column is-one-third">
				<div class="field">
				  <label class="label"><span class="fa fa-user"> Profil Picture<span></label>
				  <div class="control">
				    <div class="file is-left is-info">
					    <label class="file-label">
					      <input class="file-input" type="file" name="profil" id="profil" accept="image/*">
					      <span class="file-cta">
					        <span class="file-icon">
					          <i class="fa fa-upload"></i>
					        </span>
					        <span class="file-label">
					          Select Picture
					        </span>
					      </span>
					    </label>
					  </div>
				  </div>
				</div>
				<hr>
				<div class="field">
				  <label class="label"><span class="fa fa-user-o"> Nama Saya<span></label>
				  <div class="control">
				    <input class="input" name="nama" id="nama" type="text" placeholder="nama" value="<?php echo empty($data['user']->nama_user)?'belum ada':$data['user']->nama_user?>">
				  </div>
				</div>
				<hr>
				<div class="field">
				  <label class="label"><span class="fa fa-map-marker"> Alamat Saya<span></label>
				  <div class="control">
				     <input class="input" name="alamat" id="alamat" type="text" placeholder="alamat" value="<?php echo empty($data['user']->alamat_user)?'belum ada':$data['user']->alamat_user?>">
				  </div>
				</div>
				<hr>
			</div>
			<div class="column is-one-third">
				<div class="field">
				  <label class="label"><span class="fa fa-intersex"> Gender Saya<span></label>
				  <div class="control">
				     <div class="select" >
					    <select name="gender" id="gender">
					      <option>Select gender</option>
					      <option <?php echo $data['user']->jenis_kelamin==0?'selected':'';?> value="0"> Perempuan</option>
					      <option <?php echo $data['user']->jenis_kelamin==1?'selected':'';?> value="1"> Laki-laki</option>
					    </select>
					</div>
				  </div>
				</div>
				<hr>
				<div class="field">
				  <label class="label"><span class="fa fa-whatsapp"> Kontak Saya<span></label>
				  <div class="columns">
				  	<div class="column is-one-quarter">
				  		<div class="control">
						    <input class="input" type="text" value="+62">
						</div>
				  	</div>
				  	<div class="column">
				  		<div class="control">
						    <input class="input" name="kontak" id="kontak" type="text" value="<?php echo empty($data['user']->kontak_user)?'':$kontak?>" placeholder="8918772323">
						</div>
				  	</div>
				  </div>
				</div>
				<hr>
				<div class="field">
				  <label class="label"><span class="fa fa-facebook-square"> Sosial Media<span></label>
				  <div class="control">
				    <input class="input" name="sosial" id="sosial" type="text" placeholder="sosial" value="<?php echo empty($data['user']->sosial_user)?'belum ada':$data['user']->sosial_user?>">
				  </div>
				</div>
				<hr>
			</div>
			<div class="column">
				<button class="button">
					<span class="icon is-small">
					  <i class="fa fa-floppy-o"></i>
					</span>
					<span>Simpan</span>
				</button>
			</div>
		</div>
	</form>
	</div>
</div>
</section>
<script type="text/javascript">
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#preview').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#profil").change(function(){
	    readURL(this);
	});
</script>