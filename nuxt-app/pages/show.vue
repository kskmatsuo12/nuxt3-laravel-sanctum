<script setup>
  definePageMeta({
    // middleware: "auth",
  });
  const { user, loggedIn } = useAuth();
  const { $apiFetch } = useNuxtApp();
  const posts = ref();
  // const { user, loggedIn } = useAuth(); // or useState('auth').value
  // const { data: u } = await useAsyncData("u", () =>
  //   $apiFetch(`api/posts`, { method: "POST" })
  // );

  const post = async () => {
    const { users } = await $apiFetch(`api/posts`, { method: "POST" });
    console.log(users);
    posts.value = users;
  };
</script>

<template>
  <div>
    <div>{{ user }}</div>

    <div v-for="post in posts">{{ post.name }}</div>
    <div>
      <button @click="post">ポスト</button>
    </div>
  </div>
</template>

<style></style>
