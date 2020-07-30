import React , {Component} from 'react'
import axios from "axios";
import './Login.css';

class Register extends Component
{
    insert(user)
    {
		
	    return axios
            .post('http://127.0.0.1/zabbix/json/get_nb_value_sla.php',
			{
                value : user.email
			})
			
            .then(res =>
            {
				alert(res.data);
				if(res.data== "Error")
				{
					return null;
				}
				else
				{
					
				}
            })
            .catch(err =>
            {
                console.log("error : "+err)
            })
			alert("Hello world");
    }
    constructor() 
    {
	    super()
            this.state =
            {
				email: '',
                password: ''
            }
	    this.onChange = this.onChange.bind(this);
            this.onSubmit = this.onSubmit.bind(this);
    }

    onChange(e)
    {
	    this.setState({[e.target.name]: e.target.value})
    }

    /*IsEmail(email)
    {
	    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
    }*/

    onSubmit(e)
    {
        e.preventDefault();
        const user =
        {
			email: this.state.email,
            password: this.state.password
        }

        if((user.email=="")&&(user.password==""))
        {
            window.Swal.fire
            (
                'Error',
                'Email and password are empty',
                'error'
            )
        }
        else
        {
			if(user.email=="")
            {
                window.Swal.fire
                (
                    'Error',
                    'Email is empty',
                    'error'
                )
            }
            else
			{
				this.insert(user).then
				(
					res =>
					{
						e.preventDefault();
						if (res)
						{
							window.Swal.fire
							(
								'sucess!',
								"insert good",
								'sucess'
							)
						}
						else
						{
							if(res==null)
							{
								window.Swal.fire
								(
									'Error!',
									"Error",
									'error'
								)
							}
						}
					}
				)
						
			}
        }
    }
    render() 
	{
        return (
            <div id="back_ground">
                <div className="container">
                    <div className="row" id="rowLogin">
                        <div className="col-md mt-8 mx-auto">
                            <form
                                className="measure " id="formLogin" noValidate onSubmit={this.onSubmit}>
                                <center>
                                    <h1 className="h3 mb-3 font-weight-normal">
                                        Please sign in
                                    </h1>
                                </center>
                                <div className='form pa4 br3 shadow-5'>
                                    <div className="form-group">
                                        <label htmlFor="email">
                                            Value
                                        </label>
                                        <input type="email"
                                               className="form-control"
                                               name="email"
                                               placeholder="Insert value"
                                               value={this.state.email}
                                               onChange={this.onChange}
                                        />
                                    </div>
                                    
                                    <button type="submit"
                                            className="btn btn-lg btn-primary btn-block"
                                    >
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default Register;