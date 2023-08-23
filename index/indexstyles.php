<style>
    /* styles.css */
.loader-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  z-index: 9999; /* Ensure the loader is above other content */
}

.loader {
  border: 4px solid #f3f3f3; /* Light gray border for the spinner */
  border-top: 4px solid #3498db; /* Blue border for the spinning animation */
  border-radius: 50%;
  width: 40px;
  height: 40px;
  animation: spin 2s linear infinite; /* Rotation animation */
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

#typing-text {
  font-size: 2rem;
  margin-bottom: 10px;
  white-space: nowrap;
  overflow: hidden;
  border-right: 0.15em solid #3498db; /* Blue border for typing effect */
  animation: typing 2.5s steps(20, end), blink-caret 0.75s step-end infinite;
}

@keyframes typing {
  from, to {
    width: 0;
  }
  50% {
    border-color: transparent;
  }
}

@keyframes blink-caret {
  from, to {
    border-color: transparent;
  }
  50% {
    border-color: #3498db;
  }
}

.loader-phrase {
  font-size: 1.2rem;
  font-style: italic;
  opacity: 0.7;
}

.content {
  display: none; /* Hide content until loaded */
}

</style>