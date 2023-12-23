<template>
  <div>
    {{ user }}
  </div>
</template>

<script setup>
  definePageMeta({
    middleware: "auth",
  });
  const { user, loggedIn } = useAuth();
  //   const { $sanctumAuth } = useNuxtApp();
  //   const auth = useAuth(); // return auth state
  //   onMounted(async () => {
  //     await $sanctumAuth.getUser(); // fetch and set user data
  //   });
</script>

<style></style>
