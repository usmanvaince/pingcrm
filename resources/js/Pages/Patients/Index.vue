<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Patients</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter v-model="form.search" class="w-full max-w-md mr-4" @reset="reset"></search-filter>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4">Name</th>
          <th class="px-6 pt-6 pb-4">Email</th>
          <th class="px-6 pt-6 pb-4">SSN</th>
        </tr>
        <tr v-for="patient in patients.data" :key="patient.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
        >
          <td class="border-t px-6 py-4">
              {{ patient.name }}
          </td>

          <td class="border-t px-6 py-4">
            {{ patient.email }}
          </td>

          <td class="border-t px-6 py-4">
            {{ patient.ssn }}
          </td>

        </tr>
        <tr v-if="patients.data.length === 0">
          <td class="border-t px-6 py-4" colspan="4">No patients found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="patients.links" />
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  metaInfo: {title: 'Patients'},
  components: {
    Icon,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    patients: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(this.route('organizations'), pickBy(this.form), {preserveState: true})
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
