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
                  v-model="form.name"
                  placeholder="Nome"
                />
              </div>

              <div>
                <input
                  type="text"
                  v-model="form.description"
                  placeholder="Descrição"
                />
              </div>

              <div>
                <input
                  type="number"
                  v-model="form.price"
                  placeholder="Preço"
                />
              </div>

              <div>
                <input
                  type="text"
                  v-model="form.sku"
                  placeholder="Código"
                />
              </div>

              <div>
                <input type="number" v-model="form.stock_amount" placeholder="number" />
              </div>

              <div>
                <input type="number" v-model="form.client_id" placeholder="ID do cliente" />
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
        name: this.$page.props.product[0].name,
        description: this.$page.props.product[0].description,
        price: this.$page.props.product[0].price,
        sku: this.$page.props.product[0].sku,
        stock_amount: this.$page.props.product[0].stock_amount,
        client_id: this.$page.props.product[0].client_id,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.put(
        `/productupdate/${this.$page.props.product[0].id}`,
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
