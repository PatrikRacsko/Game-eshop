<template>
<div class="q-my-xl">
<q-table
      :data="serverData"
      row-key="name"
      :pagination.sync="serverPagination"
      :loading="loading"
      @request="request"
      :columns="columns"
      title="List of products"
      binary-state-sort
      >
      <q-tr slot="body" slot-scope="props" :props="props">
        <q-td key="id" :props="props">
          <span>{{ props.row.id }}</span>
        </q-td>
        <q-td key="name" :props="props">
          <span>{{ props.row.name }}</span>
        </q-td>
        <q-td class="text-right">
          <div v-if="props.row.id == 'DELETED'">DELETED</div>
          <div v-else>
            <q-btn round icon="edit" class="q-mr-xs" @click="$router.push('/products/' + props.row.id + '/edit')" />
            <q-btn round icon="delete" />
          </div>
        </q-td>
      </q-tr>
    </q-table>
</div>
</template>
<script>
import axios from 'axios'

export default {
  data () {
    return {
      columns: [
        { name: 'id', label: 'ID', field: 'id', sortable: false, align: 'left' },
        { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left' },
        { name: 'actions', label: 'Actions', sortable: false, align: 'right' }
      ],
      selected: [],
      loading: false,
      serverPagination: {
        page: 1,
        rowsNumber: 10, // the number of total rows in DB
        rowsPerPage: 5,
        sortBy: 'name',
        descending: true
      },
      serverData: []
    }
  },
  methods: {
    request ({ pagination }) {
      // QTable to "loading" state
      this.loading = true
      // fetch data
      axios
        .get(`http://127.0.0.1:8000/products/list/${pagination.page}?rowsPerPage=${pagination.rowsPerPage}&sortBy=${pagination.sortBy}&descending=${pagination.descending}`)
        .then(({ data }) => {
          // updating pagination to reflect in the UI
          this.serverPagination = pagination
  
          // we also set (or update) rowsNumber
          this.serverPagination.rowsNumber = data.rowsNumber
  
          // then we update the rows with the fetched ones
          this.serverData = data.rows
  
          // finally we tell QTable to exit the "loading" state
          this.loading = false
        })
        .catch(error => {
          // there's an error... do SOMETHING
          console.log(error)
  
          // we tell QTable to exit the "loading" state
          this.loading = false
        })
    }
  },
  mounted () {
    // once mounted, we need to trigger the initial server data fetch
    this.request({
      pagination: this.serverPagination,
      filter: this.filter
    })
  }
}
</script>