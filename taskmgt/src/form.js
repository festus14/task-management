import React, {Component} from 'react';
import EmailInput from './form/email';
import PasswordInput from './form/password';


class Form extends Component{
    constructor(props){
      super(props);
      this.state = {
        email: "",
        emailErr: "",
        password: "",
        passwordErr: "",

      }
    }

    emailInputHandler(e){
      this.setState(
        {
          email: e.target.value,
          emailErr: "",
        }) 
    }
    passwordInputHandler(e){
      this.setState({
        password: e.target.value,
        passwordErr: "",
      })
    }

    handleForm(e){
      e.preventDefault();
      if(!this.validateEmail(this.state.email)){
        this.setState({
          emailErr: "Email is incorrect."
        })
      }
      if(this.state.password.length <=5){
        this.setState({
          passwordErr: "Password must have at least 6 characters",
        })
      }
      
      setTimeout(()=>{
        if(!this.state.emailErr &&
            !this.state.passwordErr &&
             !this.state.passwordConfirmationErr){
              alert("Form will be submitted")
      }
    },500)
  }
    validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
  }
    render(){
    
        return(
           <form action="" onSubmit={this.handleForm.bind(this)}>
           <p className="signup">Log in</p>
             <EmailInput
                email={this.state.email}
                emailErr={this.state.emailErr}
                emailInputHandler={this.emailInputHandler.bind(this)} />
             <PasswordInput 
                password={this.state.password}
                passwordErr={this.state.passwordErr}
                passwordInputHandler={this.passwordInputHandler.bind(this)}/>
             
             <button className="btn" type="submit">Log in</button>
           </form>
    )
    
    }
}

export default Form;