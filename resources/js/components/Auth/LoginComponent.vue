<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Loginss</div>
          <div class="card-body">
            <form>
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right"
                  >Email</label
                >
                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    name="email"
                    v-model="formData.email"
                    class="form-control"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="password"
                  class="col-md-4 col-form-label text-md-right"
                  >Password</label
                >

                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    v-model="formData.password"
                    class="form-control"
                    name="password"
                    required
                  />
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button
                    type="submit"
                    class="btn btn-primary"
                    @click="handleLogin"
                  >
                    Login
                  </button>
                  <button type="submit" class="btn btn-primary">
                    Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      logs: [],
      formData: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    handleLogin() {
      console.log("dasd");
    //   axios.get("/sanctum/csrf-cookie").then((response) => {
        console.log("hi");
        axios.post("/login", this.formData)
          .then((response) => {
            console.log("User signed in!");
          })
          .catch((error) => console.log(error)); // credentials didn't match
    //   });
    },
  },
};
</script>
