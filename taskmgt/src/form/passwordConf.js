import React from 'react';

const PasswordConfirmationInput = (props) => {
    return(
        <div className="form-group">
          <input type="password" placeholder="Password confirmation"
          value={props.passwordConfirmation}
          onChange={props.passwordConfirmationInputHandler}/>

          {props.passwordConfirmationErr && 
          <p className="input-error">{props.passwordConfirmationErr}</p>
                }
        </div>
    )
}

export default PasswordConfirmationInput;