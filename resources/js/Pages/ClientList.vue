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
            <div v-if="$page.props.clients">
              <table border="1">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>full_name</th>
                    <th>display_name</th>
                    <th>document_type</th>
                    <th>document</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>password</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(client, index) in $page.props.clients"
                    :key="index"
                  >
                    <td>{{ client.id }}</td>
                    <td>{{ client.full_name }}</td>
                    <td>{{ client.display_name }}</td>
                    <td>{{ client.document_type }}</td>
                    <td>{{ client.document }}</td>
                    <td>{{ client.phone }}</td>
                    <td>{{ client.email }}</td>
                    <td>{{ client.password }}</td>
                    <td>
                      <button @click="excluir(client.id)">Excluir</button>
                      <button @click="editar(client.id)">Editar</button>
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
      window.location.replace(`/clientupdate/${id}`);
    },
    excluir(id) {
      this.$inertia.delete(`/clientdelete/${id}`);
      location.reload();
    },
  },
  // props: {
  //     auth: Object,
  //     errors: Object,
  // },
};
</script>
