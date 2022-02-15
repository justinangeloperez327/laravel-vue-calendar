import axios from 'axios'
import { useToast } from 'vue-toastification'
const toast = useToast()

const state = {
  all: []
}
const getters = {

}

const actions = {
  async getAllEvents ({ commit }) {
    let response = await axios.get('/api/event')
    commit('setEvents', response.data.events)
  },
  async createEvent({commit}, data){
    console.log(data)
    await axios.post('/api/event', data).then(({data}) => {
      toast.success(data.message)
    }).catch(e => { 
      toast.error(e.response.data.message)
    })
    await axios.get('/api/event').then(({data}) => {
      commit('setEvents', data.events)
    })
    
    
  }
}
 
const mutations = {
  setEvents (state, events) {
    state.all = events
  },

}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}