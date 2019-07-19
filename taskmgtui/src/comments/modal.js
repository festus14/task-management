import React from 'react';
import Modal from '@material-ui/core/Modal';

export default class SimpleModal extends React.Component {


    render() {
        return (


            <div>
                <Modal
                    aria-labelledby="simple-modal-title"
                    aria-describedby="simple-modal-description"
                    open={this.props.open}
                    onClose={this.props.toggleModal}
                    style={{ display: 'flex', justifyContent: 'center', alignItems: 'center'}}
                >
                    <div style={{ width: '30vw', minWidth: '100px', height: '30vh', minHeight: '100px' }}>
                        <textarea
                            onChange={this.props.handleFieldChange}
                            value={this.props.comment.message}
                            className="form-control"
                            placeholder="Your Comment"
                            name="message"
                            rows="6"
                            style={{border: '1px solid #000',
                            outline: 'none'}}
                        />
                        <button onClick={e => { e.preventDefault(); this.props.handleSubmit(this.props.comment.message); }} style={{ background: '', borderRadius: '3px',marginLeft: '5px', marginTop: '10px' }}>
                            submit
                        </button>
                    </div>
                </Modal>
            </div>
        );
    }
}
