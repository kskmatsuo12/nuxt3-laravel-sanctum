<template>
  <div>
    <div>
      <form>
        <dl>
          <dt>メールアドレス：</dt>
          <dd><input id="email" type="string" v-model="email" /></dd>
        </dl>
        <dl>
          <dt><label for="password">パスワード：</label></dt>
          <dd><input id="password" type="password" v-model="password" /></dd>
        </dl>
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
        <button type="button" @click="login">ログイン</button>
      </form>
    </div>
  </div>
</template>

<script setup>
  definePageMeta({
    middleware: "guest",
  });
  const { $sanctumAuth } = useNuxtApp();
  const router = useRouter();
  async function login() {
    await $sanctumAuth.login(
      {
        email: "test@test.com", // フォームで入力されたメールアドレス
        password: "password", // フォームで入力されたパスワード
      },

      // optional callback function
      (data) => {
        // $sanctumAuth.getUser(); // fetch and set user data
        console.log(data);
        router.push("/show");
      }
    );
  }
</script>

<style scoped></style>
