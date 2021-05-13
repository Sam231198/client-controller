<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Cadastro de cliente
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div v-for="(error, index) in errors" :key="index">
              {{ error }}
            </div>

            <form @submit.prevent="submit">
              <div>
                <input
                  type="text"
                  v-model="form.full_name"
                  placeholder="Nome completo"
                />
              </div>

              <div>
                <input
                  type="text"
                  v-model="form.display_name"
                  placeholder="Nome de visualização"
                />
              </div>

              <div>
                <input
                  type="text"
                  v-model="form.document_type"
                  placeholder="Tipo de documento"
                />
              </div>

              <div>
                <input
                  type="text"
                  v-model="form.document"
                  placeholder="Documento"
                />
              </div>

              <div>
                <input type="tel" v-model="form.phone" placeholder="Telefone" />
              </div>

              <div>
                <input type="email" v-model="form.email" placeholder="E-mail" />
              </div>

              <div>
                <input
                  type="password"
                  v-model="form.password"
                  placeholder="Senha"
                />
              </div>

              <button type="submit">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";

export default {
  components: {
    BreezeAuthenticatedLayout,
  },
  data() {
    return {
      form: {
        full_name: this.$page.props.client[0].full_name,
        document_type: this.$page.props.client[0].document_type,
        document: this.$page.props.client[0].document,
        display_name: this.$page.props.client[0].display_name,
        phone: this.$page.props.client[0].phone,
        email: this.$page.props.client[0].email,
        password: this.$page.props.client[0].password,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.put(
        `/clientupdate/${this.$page.props.client[0].id}`,
        this.form
      );
    },
  },
  props: {
    // auth: Object,
    errors: Object,
  },
};
</script>
