<?php $this->load->view('layouts/public/header', ['title' => isset($title) ? $title : 'Minha Aplicação']); ?>

<main>
  <?php echo isset($content) ? $content : ''; ?>
  <?php $this->load->view('layouts/public/footer'); ?>
</main>
