<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>404 - Página não encontrada</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              "50": "#eff6ff",
              "100": "#dbeafe",
              "200": "#bfdbfe",
              "300": "#93c5fd",
              "400": "#60a5fa",
              "500": "#3b82f6",
              "600": "#2563eb",
              "700": "#1d4ed8",
              "800": "#1e40af",
              "900": "#1e3a8a",
              "950": "#172554"
            }
          }
        },
        fontFamily: {
          'body': [
            'Inter',
            'ui-sans-serif',
            'system-ui',
            '-apple-system',
            'system-ui',
            'Segoe UI',
            'Roboto',
            'Helvetica Neue',
            'Arial',
            'Noto Sans',
            'sans-serif',
            'Apple Color Emoji',
            'Segoe UI Emoji',
            'Segoe UI Symbol',
            'Noto Color Emoji'
          ],
          'sans': [
            'Inter',
            'ui-sans-serif',
            'system-ui',
            '-apple-system',
            'system-ui',
            'Segoe UI',
            'Roboto',
            'Helvetica Neue',
            'Arial',
            'Noto Sans',
            'sans-serif',
            'Apple Color Emoji',
            'Segoe UI Emoji',
            'Segoe UI Symbol',
            'Noto Color Emoji'
          ]
        }
      }
    }
  </script>
</head>

<body data-theme="dark" class="bg-white dark:bg-gray-900">
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center">
        <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">404</h1>
        <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Algo está faltando.</p>
        <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Desculpe, não podemos encontrar essa página. Você encontrará muito para explorar na página inicial.</p>
        <a href="/" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">De volta à página inicial</a>
      </div>
    </div>
  </section>
</body>

</html>
