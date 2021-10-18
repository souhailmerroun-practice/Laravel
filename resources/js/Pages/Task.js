import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import axios from "axios";

export default class Task extends React.Component {

    constructor(props) {
        super(props);
        this.state = { error: {}, description: '' };
    
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }
    
    handleChange(event) {
        this.setState({ 
            description: event.target.value
        });
    }
    
    handleSubmit(event) {
        console.log(this.state)
        event.preventDefault();

        axios.post('/api/tasks', this.state)
            .then((response) => {
                console.log(response);
                window.location.reload();
            })
            .catch((error) => {
                console.log("error")
                this.setState({
                    error: error.response.data
                })
            });
    }

    render() {
        console.log(this.state)
        return (
            <Authenticated
                auth={this.props.auth}
                errors={this.props.errors}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Task</h2>}
            >
                <Head title="Task" />

                {this.state.error ? <div>
                    {this.state.error.message}
                </div> : <div>no error</div>}
    
                <div className="py-12">
                    <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 bg-white border-b border-gray-200">
                                <form onSubmit={this.handleSubmit}>
                                    <label>Description:</label>
                                    <input type="text" name="description" value={this.state.value} onChange={this.handleChange} />
                                    <input type="submit" value="Submit" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div className="py-12">
                    <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 bg-white border-b border-gray-200">
                                <ul>
                                {this.props.tasks.map((item) => {
                                    return <li key={item.id}>{item.description}</li>
                                })}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </Authenticated>
        );
    }
}
