import {useState} from 'react'

import './App.css'


const FormValidationExample = () => {

    const [formData, setFormData] = useState({
        username: '',
        email: '',
        password: '',
        confirmPassword: '',
    })

    const [errors, setErrors] = useState({})

    const handleChange = (e) => {
        const {name, value} = e.target;
        setFormData({
            ...formData,
            [name]: value
        })
    }

    const handleSubmit = (e) => {
        e.preventDefault();
        const validationErrors = {}
        if (!formData.username.trim()) {
            validationErrors.username = 'Username is required'
        }

        if(!formData.email.trim()) {
            validationErrors.email = 'Email is required'
        } else if(!/\S+@\S+\.\S+/.test(formData.email)) {
            validationErrors.email = 'Email is invalid'
        }

        if(!formData.password.trim()) {
            validationErrors.password = 'Password is required'
        } else if(formData.password.length < 6) {
            validationErrors.password = 'Password must be at least 6 characters'
        }

        if(!formData.confirmPassword !== formData.password) {
            validationErrors.confirmPassword = 'Passwords do not match'
        }

        setErrors(validationErrors)

        if(Object.keys(validationErrors).length === 0) {
            alert('Form submitted')
            console.log(formData)
        }
    }

    return(
        <form onSubmit={handleSubmit}>
            <div>
                <label>Username:</label>
                <input 
                    type="text"
                    name="username"
                    placeholder='username'
                    autoComplete='off'
                    onChnage={handleChange}
                />
                    {errors.username && <span>{errors.username}</span>}
            </div>
            <div>
                <label>Email:</label>
                <input 
                    type="email"
                    name="email"
                    placeholder='example@email.com'
                    autoComplete='off'
                    onChnage={handleChange}
                />
                    {errors.email && <span>{errors.email}</span>}
            </div>
            <div>
                <label>Password:</label>
                <input 
                    type="password"
                    name="password"
                    placeholder='***********'
                    autoComplete='off'
                    onChnage={handleChange}
                />
                    {errors.password && <span>{errors.confirmPassword}</span>}
            </div>
            <div>
                <label>Confirm Password:</label>
                <input 
                    type="password"
                    name="confirmPassword"
                    placeholder='***********'
                    autoComplete='off'
                    onChnage={handleChange}
                />
                    {errors.confirmPassword && <span>{errors.confirmPassword}</span>}
            </div>
            <button type='submit'>Submit</button>
            </form>
    );
};

export default FormValidationExample;