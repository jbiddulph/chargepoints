<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2>Charge Points</h2>
        <p v-if="user.id === 1">User: {{ user.name }}</p>
        <select v-if="towns">
          <option>Please select a town</option>
          <option v-for="town in towns" :key="town.id" :value="town.PostTown">
            {{ town.PostTown }}
          </option>
        </select>
      </div>
      <div class="col-md-4 text-right mt-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addStopChargeModal">
          Add Stop Charge
        </button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <!-- Modal -->
        <div class="modal fade" id="addStopChargeModal" tabindex="-1" role="dialog" aria-labelledby="addStopChargeModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <form @submit.prevent="addPoint" class="mb-4">
                <div class="modal-header">
                  <h5 class="modal-title" id="addStopChargeModalTitle">Add a new Stop Charge Point</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="ChargeDeviceId" v-model="point.ChargeDeviceId">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="ChargeDeviceRef" v-model="point.ChargeDeviceRef">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="ChargeDeviceName" v-model="point.ChargeDeviceName">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="ChargeDeviceText" v-model="point.ChargeDeviceText">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Latitude" v-model="point.Latitude">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Longitude" v-model="point.Longitude">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="SubBuildingName" v-model="point.SubBuildingName">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="BuildingName" v-model="point.BuildingName">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="BuildingNumber" v-model="point.BuildingNumber">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Thoroughfare" v-model="point.Thoroughfare">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Street" v-model="point.Street">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="DoubleDependantLocality" v-model="point.DoubleDependantLocality">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="DependantLocality" v-model="point.DependantLocality">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="PostTown" v-model="point.PostTown">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="County" v-model="point.County">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="PostCode" v-model="point.PostCode">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Country" v-model="point.Country">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="DateCreated" v-model="point.DateCreated">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="DateUpdated" v-model="point.DateUpdated">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Attribution" v-model="point.Attribution">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="ID" v-model="point.id">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="updated_at" v-model="point.updated_at">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="created_at" v-model="point.created_at">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save Charge Point</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li :class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPoints(pagination.prev_page_url)">Previous</a></li>
            <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
            <li :class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPoints(pagination.next_page_url)">Next</a></li>
          </ul>
        </nav>
        <div class="flex flex-wrap">
          <div class="col-md-4" v-for="point in points" v-bind:key="point.id">
            <div class="card mb-4">
              <div class="card-header">
                <h3>{{ point.ChargeDeviceName }}</h3>
              </div>
              <div class="card-body">
                <p>{{ point.PostTown }}</p>
                <p>{{ point.ChargeDeviceId }}</p>
                <p>{{ point.ChargeDeviceRef }}</p>
                <p>{{ point.ChargeDeviceName }}</p>
                <p>{{ point.ChargeDeviceText }}</p>
                <p>{{ point.Latitude }}</p>
                <p>{{ point.Longitude }}</p>
                <button v-on:click="isHidden = !isHidden">Toggle More</button>
                <div v-if="!isHidden" class="address">
                  <h2>Address:</h2>
                  <div v-if="point.SubBuildingName">{{ point.SubBuildingName }}</div>
                  <div v-if="point.BuildingName">{{ point.BuildingName }}</div>
                  <div v-if="point.BuildingNumber">{{ point.BuildingNumber }}</div>
                  <div v-if="point.Thoroughfare">{{ point.Thoroughfare }}</div>
                  <div v-if="point.Street">{{ point.Street }}</div>
                  <div v-if="point.DoubleDependantLocality">{{ point.DoubleDependantLocality }}</div>
                  <div v-if="point.DependantLocality">{{ point.DependantLocality }}</div>
                  <div v-if="point.PostTown">{{ point.PostTown }}</div>
                  <div v-if="point.County">{{ point.County }}</div>
                  <div v-if="point.PostCode">{{ point.PostCode }}</div>
                  <div v-if="point.Country">{{ point.Country }}</div>
                  <p>{{ point.DateCreated }}</p>
                  <p>{{ point.DateUpdated }}</p>
                  <p>{{ point.Attribution }}</p>
                  <p>ID: {{ point.id }}</p>
                </div>
                <button v-if="user.id === 1" @click="editPoint(point)" class="btn btn-warning mb-2" data-toggle="modal" data-target="#addStopChargeModal">Edit</button>
                <button v-if="user.id === 1" @click="deletePoint(point.id)" class="btn btn-danger mb-2">Delete</button>
              </div>
            </div>
          </div>
        </div>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li :class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPoints(pagination.prev_page_url)">Previous</a></li>
            <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
            <li :class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPoints(pagination.next_page_url)">Next</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    'user',
    'towns'],
  data() {
    return {
      points: [],
      point: {
        'ChargeDeviceId': '',
        'ChargeDeviceRef': '',
        'ChargeDeviceName': '',
        'ChargeDeviceText': '',
        'Latitude': '',
        'Longitude': '',
        'SubBuildingName': '',
        'BuildingName': '',
        'BuildingNumber': '',
        'Thoroughfare': '',
        'Street': '',
        'DoubleDependantLocality': '',
        'DependantLocality': '',
        'PostTown': '',
        'County': '',
        'PostCode': '',
        'Country': '',
        'DateCreated': '',
        'DateUpdated': '',
        'Attribution': '',
        'id': '',
      },
      point_id: '',
      pagination: {},
      edit: false,
      isHidden: true,
    }
  },
  created() {
    this.fetchPoints();
  },
  methods: {
    fetchPoints(page_url) {
      let vm = this
      page_url = page_url || '/api/points'
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.points = res.data
          vm.makePagination(res.meta, res.links)
        })
        .catch(err => console.log(err))
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      }
      this.pagination = pagination;
    },
    deletePoint(id) {
      if(confirm('Are you sure?')) {
        fetch(`/api/points/${id}`, {
          method: 'delete'
        })
        .then(res => res.text())
        .then( data => {
          alert('Point Removed')
          this.fetchPoints()
          console.log(data)
        })
        .catch(err => console.log(err))
      }
    },
    addPoint() {
      if(this.edit === false) {
        fetch('/api/points', {
          method: 'post',
          body: JSON.stringify(this.point),
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          }
        })
        .then(res => res.text())
        .then(data => {
          this.point.ChargeDeviceId = '',
          this.point.ChargeDeviceRef = '',
          this.point.ChargeDeviceName = '',
          this.point.ChargeDeviceText = '',
          this.point.Latitude = '',
          this.point.Longitude = '',
          this.point.SubBuildingName = '',
          this.point.BuildingName = '',
          this.point.BuildingNumber = '',
          this.point.Thoroughfare = '',
          this.point.Street = '',
          this.point.DoubleDependantLocality = '',
          this.point.DependantLocality = '',
          this.point.PostTown = '',
          this.point.County = '',
          this.point.PostCode = '',
          this.point.Country = '',
          this.point.Attribution = '',
          this.point.DateUpdated = '',
          this.point.DateCreated = '',
          this.point.id = '',
          this.point.created_at = '',
          this.point.updated_at = '',
          alert('Point Added')
          this.fetchPoints()
        })
        .catch(err => console.log(err))
      } else {
        //update
        fetch('/api/points', {
          method: 'patch',
          body: JSON.stringify(this.point),
          headers: {
            'content-type': 'application/json',
          }
        })
        .then(res => res.json())
        .then(data => {
          this.point.ChargeDeviceId = '',
          this.point.ChargeDeviceRef = '',
          this.point.ChargeDeviceName = '',
          this.point.ChargeDeviceText = '',
          this.point.Latitude = '',
          this.point.Longitude = '',
          this.point.SubBuildingName = '',
          this.point.BuildingName = '',
          this.point.BuildingNumber = '',
          this.point.Thoroughfare = '',
          this.point.Street = '',
          this.point.DoubleDependantLocality = '',
          this.point.DependantLocality = '',
          this.point.PostTown = '',
          this.point.County = '',
          this.point.PostCode = '',
          this.point.Country = '',
          this.point.Attribution = '',
          this.point.DateUpdated = '',
          this.point.DateCreated = '',
          this.point.id = '',
          this.point.created_at = '',
          this.point.updated_at = '',
          alert('Point Updated')
          this.fetchPoints()
          console.log(data)
        })
        .catch(err => console.log('ERROR: ', err))
      }
    },
    editPoint(point) {
      this.edit = true;
      this.point.id = point.id
      this.point.point_id = point.id
      this.point.ChargeDeviceId = point.ChargeDeviceId
      this.point.ChargeDeviceRef = point.ChargeDeviceRef
      this.point.ChargeDeviceName = point.ChargeDeviceName
      this.point.ChargeDeviceText = point.ChargeDeviceText
      this.point.Latitude = point.Latitude
      this.point.Longitude = point.Longitude
      this.point.SubBuildingName = point.SubBuildingName
      this.point.BuildingName = point.BuildingName
      this.point.BuildingNumber = point.BuildingNumber
      this.point.Thoroughfare = point.Thoroughfare
      this.point.Street = point.Street
      this.point.DoubleDependantLocality = point.DoubleDependantLocality
      this.point.DependantLocality = point.DependantLocality
      this.point.PostTown = point.PostTown
      this.point.County = point.County
      this.point.PostCode = point.PostCode
      this.point.Country = point.Country
      this.point.Attribution = point.Attribution
      this.point.DateUpdated = point.DateUpdated
      this.point.DateCreated = point.DateCreated
      this.point.created_at = point.created_at
      this.point.updated_at = point.updated_at
    }
  }
}
</script>