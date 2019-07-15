import React from 'react';

const EmailInput = (props) => {
return(
    <div className="form-group">
          <input type="email" placeholder="Email" value={props.email}
          onChange={props.emailInputHandler} />
          {props.emailErr &&
            <p className="input-error">{props.emailErr}</p>
            }
          
    </div>
)

}

export default EmailInput;