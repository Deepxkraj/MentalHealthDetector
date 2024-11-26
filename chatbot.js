const conversationFlow = [
  {
    question: "Hello! How are you feeling right now?",
    options: ["Like I need some relaxation", "Full of energy", "A bit down", "Trying to stay positive"],
    suggestions: {
      "Like I need some relaxation": "Taking a few deep breaths or listening to calm music could help.",
      "Full of energy": "That's great! Maybe use that energy on something you enjoy.",
      "A bit down": "It might help to talk to someone or try something comforting.",
      "Trying to stay positive": "That's the spirit! Small steps can make a big difference."
    }
  },
  {
    question: "What has been weighing on your mind lately?",
    options: ["Workload and deadlines", "Relationship struggles", "Family responsibilities", "Personal goals and ambitions"],
    suggestions: {
      "Workload and deadlines": "Organizing your tasks and taking breaks could help manage the load.",
      "Relationship struggles": "Talking to someone you trust can offer perspective and support.",
      "Family responsibilities": "Balancing family time and self-care is important for well-being.",
      "Personal goals and ambitions": "Remember to take it step by step. Progress is still progress."
    }
  },
  {
    question: "How have you been spending your free time?",
    options: ["Trying to relax and unwind", "Catching up on hobbies", "Learning something new", "Not much free time lately"],
    suggestions: {
      "Trying to relax and unwind": "That sounds like a good idea! Maybe try a new relaxation method too.",
      "Catching up on hobbies": "Great! Hobbies are a fantastic way to relieve stress.",
      "Learning something new": "That’s awesome! Learning can be very fulfilling.",
      "Not much free time lately": "It might help to carve out even a few minutes for yourself."
    }
  },
  {
    question: "What would you say describes your recent mood?",
    options: ["Eager to get things done", "Overwhelmed by everything", "Grateful for small things", "Looking for some inspiration"],
    suggestions: {
      "Eager to get things done": "That’s fantastic! Setting small goals can help you keep that momentum.",
      "Overwhelmed by everything": "Taking it one step at a time and prioritizing can lighten the load.",
      "Grateful for small things": "That's a beautiful outlook! Appreciating small joys can bring peace.",
      "Looking for some inspiration": "Try exploring new things, or reflect on what has inspired you in the past."
    }
  },
  {
    question: "How are your energy levels these days?",
    options: ["Constantly drained", "Up and down", "Mostly balanced", "High energy"],
    suggestions: {
      "Constantly drained": "It might help to prioritize rest and eat well to recharge.",
      "Up and down": "Try tracking your energy patterns to understand what might affect it.",
      "Mostly balanced": "That's great! Maintaining healthy habits can help keep it steady.",
      "High energy": "Wonderful! Using that energy for physical activity or creative work might be rewarding."
    }
  },
  {
    question: "Are you finding joy in things you used to enjoy?",
    options: ["Yes, absolutely", "Some things, but not all", "Not as much lately", "Not really"],
    suggestions: {
      "Yes, absolutely": "That’s fantastic! Keep nurturing those activities you enjoy.",
      "Some things, but not all": "It's okay to adjust what you spend time on. Discovering new joys is great too.",
      "Not as much lately": "It might help to re-engage with things you loved in a small way.",
      "Not really": "Exploring new interests could be refreshing."
    }
  },
  {
    question: "How often do you get outside or spend time in nature?",
    options: ["Almost every day", "A few times a week", "Not often, but I’d like to", "Rarely"],
    suggestions: {
      "Almost every day": "That's wonderful! Nature has a calming effect.",
      "A few times a week": "Keep it up! Time in nature can be very rejuvenating.",
      "Not often, but I’d like to": "Maybe start with a short walk nearby. Nature can lift your spirits.",
      "Rarely": "Even a brief time outdoors might give you a refreshing boost."
    }
  },
  {
    question: "How well are you sleeping these days?",
    options: ["I sleep deeply every night", "I get a few hours", "Struggling to fall asleep", "Sleep is all over the place"],
    suggestions: {
      "I sleep deeply every night": "That’s excellent! Keep up any good sleep habits you have.",
      "I get a few hours": "It may help to set a calming pre-sleep routine.",
      "Struggling to fall asleep": "Reducing screen time and relaxing before bed could help.",
      "Sleep is all over the place": "A regular schedule might improve your rest quality over time."
    }
  },
  {
    question: "How would you describe your daily routine?",
    options: ["Very structured", "Somewhat organized", "Changes daily", "Not much routine at all"],
    suggestions: {
      "Very structured": "Having structure is great! Just remember to allow some flexibility too.",
      "Somewhat organized": "Good balance! This helps with both productivity and relaxation.",
      "Changes daily": "Adding a bit of consistency could provide stability.",
      "Not much routine at all": "Consider starting with small, manageable routines to stay balanced."
    }
  },
  {
    question: "What’s something you’re looking forward to?",
    options: ["An upcoming event", "Achieving a personal goal", "Spending time with loved ones", "Taking a break soon"],
    suggestions: {
      "An upcoming event": "Exciting! Having something to look forward to can boost your mood.",
      "Achieving a personal goal": "That’s wonderful! Celebrating small wins along the way helps.",
      "Spending time with loved ones": "That sounds lovely. Quality time is very uplifting.",
      "Taking a break soon": "That’s great! Planning for relaxation is a healthy choice."
    }
  },
  // Add 15 more questions following this pattern...
];


let currentStep = 0;

// Function to display the bot's question and options
function displayBotQuestion() {
  const optionsContainer = document.getElementById("options-container");

  // Clear previous options
  optionsContainer.innerHTML = "";

  // Add bot's question to the chat after a delay
  const question = conversationFlow[currentStep].question;
  addMessageToChat("...", "bot"); // Temporary "typing" indicator

  setTimeout(() => {
      // Replace "typing" indicator with actual question
      const chatContainer = document.getElementById("chat-container");
      chatContainer.lastChild.textContent = question;

      // Display options as buttons
      conversationFlow[currentStep].options.forEach(option => {
          const button = document.createElement("button");
          button.classList.add("option-button");
          button.textContent = option;
          button.onclick = () => handleUserResponse(option);
          optionsContainer.appendChild(button);
      });
  }, 3000); // 3-second delay
}

// Function to handle the user's response
function handleUserResponse(selectedOption) {
  addMessageToChat(selectedOption, "user"); // Display user's selected option as a message

  // Display suggestion based on the user’s selected option with a 3-second delay
  const suggestion = conversationFlow[currentStep].suggestions[selectedOption];
  addMessageToChat("...", "bot"); // Temporary "typing" indicator

  setTimeout(() => {
      const chatContainer = document.getElementById("chat-container");
      chatContainer.lastChild.textContent = suggestion; // Replace "typing" indicator with actual suggestion

      // Advance the conversation flow
      if (currentStep < conversationFlow.length - 1) {
          currentStep++;
          setTimeout(displayBotQuestion, 500);
      } else {
          endConversation();
      }
  }, 3000); // 3-second delay for suggestion
}

// Function to display a message in the chat container
function addMessageToChat(message, sender) {
  const chatContainer = document.getElementById("chat-container");
  const messageElement = document.createElement("div");
  messageElement.classList.add("message");
  messageElement.classList.add(sender === "user" ? "user-message" : "bot-message");
  messageElement.textContent = message;
  chatContainer.appendChild(messageElement);
  chatContainer.scrollTop = chatContainer.scrollHeight;
}

// Function to end the conversation with a closing message
function endConversation() {
  addMessageToChat("Thank you for sharing! I'm here anytime you need support.", "bot");
  document.getElementById("options-container").innerHTML = ""; // Clear any remaining options
}

// Start the conversation by displaying the first question
displayBotQuestion();
