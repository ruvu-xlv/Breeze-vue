<template>
    <footer class="w-full px-6 py-4 bg-white dark:bg-gray-800 text-center shadow rounded-t-xl">
      <p class="text-sm text-gray-700 dark:text-gray-300">
        &copy; {{ year }}made with by <a href="https://www.creative-tim.com/"><b>Creative Tim</b></a> for a better web.
      </p>
    </footer>
  </template>
  
  <script setup>
  const year = new Date().getFullYear()
  </script>
  