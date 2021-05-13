<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Lista de clientes
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div v-if="$page.props.products">
              <table border="1">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>price</th>
                    <th>sku</th>
                    <th>stock_amount</th>
                    <th>client_id</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(product, index) in $page.props.products"
                    :key="index"
                  >
                    <td>{{ product.id }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.sku }}</td>
                    <td>{{ product.stock_amount }}</td>
                    <td>{{ product.client_id }}</td>
                    <td>
                      <button @click="excluir(product.id)">Excluir</button>
                      <button @click="editar(product.id)">Editar</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
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
  methods: {
    editar(id) {
      window.location.replace(`/productupdate/${id}`);
    },
    excluir(id) {
      this.$inertia.delete(`/productdelete/${id}`);
      location.reload();
    },
  },
  // props: {
  //     auth: Object,
  //     errors: Object,
  // },
};
</script>
