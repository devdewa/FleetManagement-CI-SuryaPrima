<?php
if($this->uri->segment(3)) {
	$data = $this->uri->segment(3);
} else {
	$data = 0;
}
?>

<script id="group" data-name="<?= $data  ?>" src="<?php echo base_url(); ?>assets/livetrack.js"></script>
  <script src="<?php echo base_url(); ?>assets/fontawesome-markers.min.js"></script>

<div class="col-lg-12 col-md-12" id="map_canvas" style="width: 100%; height: 650px"></div>
</div>
</div>