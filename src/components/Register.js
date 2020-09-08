import './Login.css';
import React from 'react';
import axios from 'axios';

export default class PersonList extends React.Component 
{
  state = 
        {
            name: '',
        }

  handleChange = event => 
  {
    this.setState
    (
        { 
            name: event.target.value 
        }
    );
  }

  handleSubmit = event => 
  {
    event.preventDefault();

    const user = 
    {
      name: this.state.name
    };

    axios.post
    (
        'http://127.0.0.1/zabbix/json/get_nb_value_sla.php', 
        {
            sla : this.state.name
        }
    )
    .then
    (
        res => 
        {
            console.log(res);
            alert(res.data);
            console.log(res.data);
            window.Swal.fire
            (
                'Sucess',
                res.data,
                'success'
            )
        }
    )
  }
  
  render() 
  {
      return (
      <div>
          <center>
            <form onSubmit={this.handleSubmit}>
                <br />
                <br />
                <label>
                    Enter SLA value:
                    <input class="form-control" type="text" name="name" onChange={this.handleChange} />
                </label>
                <button class="btn btn-primary" type="submit">Add</button>
            </form>
          </center>
      </div>
    )
  }
}