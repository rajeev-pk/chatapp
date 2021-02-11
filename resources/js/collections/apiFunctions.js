const apiFunctions = {

    createMessage(key) {
        let message = document.createElement("div");
        message.setAttribute("class", "card message mb-2")

        message.innerHTML = `<div
        class = "card-body p-2" >
            <h6 class="p-0 m-0">${key.chat_user.username}</h6>
        <p class="message-text p-0">${key.message}</p>
        <p class="p-0 message-text">${key.created_at}</p>
        </div>`;

        return message;
    },

    setMessages(res) {
        const chatroom = document.getElementById("chatroom");
        let messages = [];

        let i = 0;

            // messages[i] = this.createMessage(res);
        for (const [key, value] of Object.entries(res)) {
            messages[key] = this.createMessage(value);
            console.log(value)
        }

        messages.forEach(message => {
            chatroom.appendChild(message)
        });

        console.log(messages);
    },

    //get singel chat user messages

    async getSingleChatUserMessages() {
        // get id from url
        let url = window.location.href;
        let id = url.substring(url.lastIndexOf('/') + 1);

        const response = await fetch(`http://localhost:8000/api/user/messages/${id}`, {
            method: 'POST',
            mode: 'cors',
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(res => res.json())
            .then(res => this.setMessages(res));


    },
}

export default apiFunctions;
