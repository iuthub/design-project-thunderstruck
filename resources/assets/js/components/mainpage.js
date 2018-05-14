import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class MainPage extends Component {

    constructor()
    {
        super();
        this.state = {
            main: [],
            images: [],
            weather: [],
            email: "",
            message: "",
        };

        this.handleChange1 = this.handleChange1.bind(this);
        this.handleChange2 = this.handleChange2.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange1(e){
        this.setState({
          email: e.target.value
        })
    }
    handleChange2(e){
        this.setState({
          message: e.target.value
        })
    }
    handleSubmit(e){
        e.preventDefault();
        if(this.state.email == "" || this.state.message == "")
        {
            alert("Fill all fields!");
            return false;
        }
        const data = {
          email: this.state.email,
          message: this.state.message
        }
        axios.post('api/message', data).then((response) => {});
        document.getElementById("email").value="";
        document.getElementById("message").value="";
        alert("Your message has been sent!");
    }

    componentWillMount()
    {
        axios.get('/api/main').then(response => {
            if(response.data[2].length != 0)
            {
                let d1 = response.data[2].list[0];
                let d2 = response.data[2].list[1];
                let d3 = response.data[2].list[2];

                let date1 = new Date(d1.dt * 1000);
                let date2 = new Date(d2.dt * 1000);
                let date3 = new Date(d3.dt * 1000);

                let weekdays = [ "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun" ];

                let w = {
                    day1: {
                        temp: parseInt(d1.temp.day),
                        date: date1.getDate() + "." + (date1.getMonth() + 1) + "." + date1.getFullYear(),
                        week: weekdays[date1.getDay()]
                    },
                    day2: {
                        temp: parseInt(d2.temp.day),
                        date: date2.getDate() + "." + (date2.getMonth() + 1) + "." + date2.getFullYear(),
                        week: weekdays[date2.getDay()]
                    },
                    day3: {
                        temp: parseInt(d3.temp.day),
                        date: date3.getDate() + "." + (date3.getMonth() + 1) + "." + date3.getFullYear(),
                        week: weekdays[date3.getDay()]
                    },
                };

                this.setState({
                    main: response.data[0],
                    images: response.data[1],
                    weather: w,
                });
            }
            else{
                this.setState({
                    main: response.data[0],
                    images: response.data[1],
                });
            }
            

        }).catch(error => {
            console.log(error)
        });
    }

    render() {
        return (
            <div>
            <div className="section">
            <div className="container-fluid p-0 m-0 ">  
            <div className="first_page">            
                    <div className="back">
                    <div className="container">             
                        <div className="row justify-content-center text-center">    
                            <div className="col-lg-8 col-md-10 col-sm-12 col-xs-12 info">
                                <h2 className="text-uppercase mb-3 ">welcome to</h2>
                                <div className="line">                              
                                    <p><span><i className="fas fa-star small"></i><i className="fas fa-star"></i><i className="fas fa-star small"></i></span></p>
                                    <h4 className="name">{this.state.main.title}</h4>
                                    </div>
                                    <p className="my-3">{this.state.main.description}</p>                       
                            </div>
                        </div>
                        </div>
                        </div>  
                    </div>          
        </div>
    </div>
    <div className="section">
        <div className="conatiner-fluid p-0 m-0">
            <div className="about">
                <div className="container">
                    <div className="row justify-content-center text-center">
                        <div className="col-lg-6 col-md-8 col-sm-12 col-xs-12 starter ">
                            <h1 className="text-uppercase">About Hotel</h1>
                        </div>
                    </div>
                    <div className="row justify-content-center text-center">
                        <div className="col-lg-11 col-md-11 col-sm-10 col-xs-12 text_about">
                            <p>{this.state.main.about}</p>    
                    </div>
                </div>
                <div className="row justify-content-end for_btn">
                    <div className="col-lg-3 col-md-3 col-xs-6 col-sm-6 ">
                        <a href="/view" className="btn" role="btn">3D View of Hotel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div className="section">
        <div className="slide" data-anchor="slide1">
        <div className="conatiner-fluid p-0 m-0">
            <div className="rooms ">
                <div className="container">
                    <div className="row justify-content-center text-center">
                        <div className="col-lg-8 col-md-8 col-sm-12 col-xs-12 starter ">
                            <h1 className="text-uppercase">Services</h1>
                        </div>
                    </div>
                    <div className="row justify-content-around">
                        <div className="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                          <div className="swiper-container">
                            <div className="swiper-wrapper">
                            {
                                this.state.images.map((elem, i)=> {
                                    if(elem.part == "rooms")
                                    return <div className="swiper-slide" key={i}><img src={"/storage/uploaded_images/carousel/"+elem.image} alt="image" className="d-block w-100"></img></div>
                                })
                            }                                                
                            </div>
                            <div className="swiper-pagination"></div>
                            <div className="swiper-button-next"></div>
                            <div className="swiper-button-prev"></div>
                         </div>
                        </div>                      
                            <div className="col-lg-4 col-md-4 text_info">
                                <h1 className="text-center">Rooms</h1>
                                <p>{this.state.main.roomsDesc}</p>
                            </div>
                            
                            <div className="col-lg-3 col-md-3 col-xs-6 col-sm-6 ">
                                <a href="/categories" className="btn" role="btn">See all categories</a>
                            </div>
                    </div>  
                    </div>
                </div>
            </div>
        </div>      
        <div className="slide"  data-anchor="slide2">
            <div className="conatiner-fluid p-0 m-0" >
            <div className="restaurants">
                
                <div className="container">
                    <div className="row justify-content-center text-center">
                        <div className="col-lg-8 col-md-8 col-sm-12 col-xs-12 starter ">
                            <h1 className="text-uppercase">Services</h1>
                        </div>
                    </div>
                    <div className="row justify-content-around">
                        <div className="col-lg-6 col-md-8 col-sm-10 col-xs-12">             
                                <div className="swiper-container">
                            <div className="swiper-wrapper">
                              {
                                this.state.images.map((elem, i)=> {
                                    if(elem.part == "rests")
                                    return <div className="swiper-slide" key={i}><img src={"/storage/uploaded_images/carousel/"+elem.image} alt="image" className="d-block w-100"></img></div>
                                })
                            }                         
                            </div>
                            <div className="swiper-pagination"></div>
                            <div className="swiper-button-next"></div>
                            <div className="swiper-button-prev"></div>
                         </div>                 
                    </div>  
                            <div className="col-lg-4 col-md-4 text_info">
                                <h1 className="text-center">Restaurants</h1>
                                <p>{this.state.main.restDesc}</p>
                            </div>              
                
                    </div>
                </div>
                </div>
            </div>
        </div>  
        <div className="slide" data-anchor="slide3">            
            <div className="container-fluid m-0 p-0">
                <div className="offers">
                    <div className="container">
                        <div className="row justify-content-center text-center">
                            <div className="col-lg-6 col-md-8 col-sm-10 col-xs-12 starter ">
                                <h1 className="text-uppercase">Special Offers</h1>
                        </div>
                    </div>
                    <div className="row justify-content-around">
                        <div className="col-lg-6 col-md-8 col-sm-10 col-xs-12 ">
                        <div className="swiper-container">
                            <div className="swiper-wrapper">
                              {
                                this.state.images.map((elem, i)=> {
                                    if(elem.part == "igloos")
                                    return <div className="swiper-slide" key={i}><img src={"/storage/uploaded_images/carousel/"+elem.image} alt="image" className="d-block w-100"></img></div>
                                })
                            }                    
                            </div>
                            <div className="swiper-pagination"></div>
                            <div className="swiper-button-next"></div>
                            <div className="swiper-button-prev"></div>
                         </div>
                    </div>
                    <div className="col-lg-4 col-md-4 col-sm-12 text_info">
                        <h1 className="text-center">Glass-Igloos</h1>
                        <p>{this.state.main.glassDesc}</p>
                    </div>
                    </div>                  
                </div>
            </div>
        </div>
        </div>  
        </div>      
        <div className="section">
        <div className="m-0 p-0 container-fluid footer">
        <div className="back">
            <div className="container">
                <div className="row justify-content-between">
                <div className="col-lg-6 col-sm-11 col-xs-11 col-md-6">
                    <div className="row justify-content-center ">                       
                        <div className="col-lg-10 col-md-12 col-sm-12 col-xs-12 ">
                            <h2 className="text-uppercase text-center text">contact us</h2>                         
                        </div>
                        <div className="col-lg-12 col-md-12 col-sm-12 p-0 m-0">
                            <form action="/sendMessage" method="POST" onSubmit={this.handleSubmit}>
                                <input id="email" type="email" name="email" placeholder="Email" className="w-100" onChange={this.handleChange1}></input>
                                <textarea id="message" name="message" type="message" cols="74" rows="8" placeholder="Leave your message..." className="w-100" onChange={this.handleChange2}></textarea>
                                <button type="submit" className="btn-block">SEND NOW</button>
                            </form>
                            
                        </div>
                    </div>
                </div>  
                <div className="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div className="row justify-content-between info w-100 bb">
                        <div className="col-lg-6 col-sm-6 col-md-6 col-xs-6 address ">
                            <h5 className="text-uppercase">addrees</h5>
                            <p>{this.state.main.address}</p>
                        </div>
                        <div className="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <ul className="contacts">
                                <li><h5 className="text-uppercase">contacts</h5></li>
                                <li><i className="fa fa-phone" aria-hidden="true"></i>{this.state.main.tel1}</li>
                                <li><i className="fa fa-phone" aria-hidden="true"></i>{this.state.main.tel2}</li>
                                <li className="email"><i className="fa fa-envelope"></i>{this.state.main.email}</li>
                            </ul>                           
                        </div>
                    </div>
                    <div className="row" id="map" rows="8"></div>
                    
                    <div className="row icons justify-content-center">                      
                        <ul className="list-inline ">
                            <li className="list-inline-item ml-0"><a href={'//tg.me/' + this.state.main.tgLink}><i className="fab fa-telegram-plane" aria-hidden="true"></i></a></li>
                            <li className="list-inline-item"><a href={'//fb.com/' + this.state.main.fbLink}><i className="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li className="list-inline-item"><a href={'//twitter.com/' + this.state.main.twiLink}><i className="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li className="list-inline-item"><a href={'//instagram.com/' + this.state.main.instaLink}><i className="fab fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>                       
                    </div>                  
                </div>
                </div>
                <div className="row justify-content-between">
                <div className="weather col-lg-6 col-md-7 col-sm-9">
                    <div className="country">
                        FINLAND
                        <div>WEATHER</div>
                    </div>
                    {
                        Object.keys(this.state.weather).map((elem, i)=> {
                            return <div className="days" key={i.toString()}>
                                    <span className="date">{this.state.weather[elem].date}</span>
                                    <div className="degree"><span className="number">{this.state.weather[elem].temp}</span>°C <span className="day"> | {this.state.weather[elem].week}</span></div>
                                </div>
                        })
                    }
                    

                </div>
                <div className="copyrights justify-content-center" > 
                    <p className="mb-0">{this.state.main.studio}</p> 
                        {this.state.main.titleDown}
                </div>      
                </div>
            </div>          
        </div>
    </div>
    </div>
</div>
        );
    }
}

if (document.getElementById('fullpage')) {
    ReactDOM.render(<MainPage />, document.getElementById('fullpage'));
}