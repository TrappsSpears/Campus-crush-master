<style>
.comm_container{
    display: grid;
    grid-template-columns: 20% 80%;
    height:93%;
    width: 100%;
}
.comm_name{
    display: flex;
    flex-direction: column;
    border-right: 2px solid #202020;
}
.profil_user img{
    height: 70px;
    width: 70px;
    border-radius: 32px;
}
.user_home{
    margin-top: 10px;
}
.user_home h3{
    text-align: left;
    margin-bottom: 10px;
}
.user_home div{
    margin-bottom: 10px;
    background-color: #202020;
    padding: 8px;
    text-align: left;
    font-size: 20px;
    cursor: pointer;
}
.user_home .btn_create {
    background-color: inherit;
}
.comm_chat .btn_create button{
    background-color: rgb(0, 101, 196);
    padding: 6px 12px;
    font-size: 20px;
    font-weight: 600;
    color: white;
    border-radius: 6px;

    border: none;
    cursor: pointer;
    position: absolute;
    top: 80%;
    left: 90%;
}
.comm_chat .header_comm{
    text-align: left;
}
</style>