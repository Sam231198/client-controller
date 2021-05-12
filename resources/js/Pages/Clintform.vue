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
            <form>
              <div>
                <input
                  id="full_name"
                  v-model="full_name"
                  placeholder="Nome completo"
                />
              </div>
              <div>
                <input
                  id="type_document"
                  v-model="type_document"
                  placeholder="Tipo de documento"
                />
              </div>
              <div>
                <input
                  id="document"
                  v-model="document"
                  placeholder="Documento"
                />
              </div>
              <div>
                <input id="phone" v-model="phone" placeholder="Telefone" />
              </div>
              <div>
                <input id="email" v-model="email" placeholder="E-mail" />
              </div>
              <div>
                <input id="password" v-model="password" placeholder="Senha" />
              </div>
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
  data: function () {
    return {
      form: {
        full_name: null,
        type_documetn: null,
        document: null,
        phone: null,
        email: null,
        password: null,
      },
    };
  },
  // props: {
  //     auth: Object,
  //     errors: Object,
  // },
};
</script>
