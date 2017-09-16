<style type="text/css">
	.sidebar-image img{
		width: 100px;
		height: 100px;
	}
</style>
<br>
<section class="section container hero is-small is-has-backgound is-bold box">
  <div class="hero-body">
    <div class="container">
      	<div>
      		<article class="media">
	      		<figure class="media-left">
	      			<p class="image sidebar-image">
	      				<img src="<?php echo site_url("images/generate/user/{$data['user']->username}");?>">
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
		<div class="columns">
			<div class="column">
				<?php
					if ($this->session->username == $this->input->get('uid')) { ?>
						<span class="level-right">
							<a href="<?php echo site_url('page/profil/edit_profile');?>" class="button"> 
								<span class="fa fa-edit"> Edit</span>
							</a>
						</span>	
				<?php
					}
				?>	
				<h4 class="title has-text-dark">
					<span class="fa fa-map-marker"> Alamat</span>
				</h4>
				<p class="has-text-grey-light"><?php echo empty($data['user']->alamat_user)?'belum ada':$data['user']->alamat_user?></p>
				<hr>
				<h4 class="title has-text-dark">
					<span class="fa fa-intersex"> Gender</span>
				</h4>
				<p class="has-text-grey-light"><?php echo $data['user']->jenis_kelamin == 1?'Laki-laki':'Perempuan'?></p>
				<hr>
				<h4 class="title has-text-dark">
					<span class="fa fa-whatsapp"> Kontak</span>
				</h4>
				<p class="has-text-grey-light"><?php echo empty($data['user']->kontak_user)?'belum ada':$data['user']->kontak_user?></p>
				<hr>
				<h4 class="title has-text-dark">
					<span class="fa fa-facebook-square"> Sosial Media</span>
				</h4>
				<p class="has-text-grey-light"><?php echo empty($data['user']->sosial_user)?'belum ada':$data['user']->sosial_user?></p>
				<hr>
			</div>
		</div>
	</div>
</div>
</section>