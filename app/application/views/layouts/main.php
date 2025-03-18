<?php $this->load->view('layouts/header', ['title' => isset($title) ? $title : 'Minha Aplicação']); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<main class="sm:ml-64 mt-14 ">

  <?php echo isset($content) ? $content : ''; ?>
  <?php $this->load->view('layouts/footer'); ?>
</main>
