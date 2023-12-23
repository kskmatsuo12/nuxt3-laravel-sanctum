// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  ssr: false,
  devtools: { enabled: true },
  modules: [
    "nuxt-sanctum-auth",
    // ...
  ],
  nuxtSanctumAuth: {
    token: false, // set true to use jwt-token auth instead of cookie. default is false
    baseUrl: "http://localhost:8081",
    endpoints: {
      csrf: "/sanctum/csrf-cookie",
      login: "/api/login",
      logout: "/api/logout",
      user: "/api/user",
    },
    csrf: {
      headerKey: "X-XSRF-TOKEN",
      cookieKey: "XSRF-TOKEN",
      tokenCookieKey: "nuxt-sanctum-auth-token",
    },
    redirects: {
      home: "/show",
      login: "/login",
      logout: "/",
    },
  },
});
