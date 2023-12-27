# Load necessary library
library("e1071",lib.loc= "C:/Users/user/AppData/Local/R/win-library/4.2")

# Load the stress dataset
load("stress.RData")  # Make sure this path is correct
# If you're loading from a CSV file instead of an RData file
stress <- read.csv("stress.csv")

# Rename the target variable for ease of use
names(stress)[names(stress) == "How.would.you.rate.your.stress.levels."] <- "StressLevel"

# Remove the Timestamp column
stress <- stress[, !(names(stress) %in% c("Timestamp"))]

# Check if renaming was successful and Timestamp is removed
print(colnames(stress))

# Split the data into training and test sets
set.seed(123)  # Setting seed for reproducibility
test.index = sample(1:nrow(stress), round(0.2 * nrow(stress)))  # 20% data as test set
test.data = stress[test.index,] 
train.data = stress[-test.index,]

# Tune parameters for SVM using the renamed target variable
tuned <- tune.svm(StressLevel ~ ., data = train.data, gamma = 10^(-3:-1), cost = 10^(-1:1)) 

# Continue with your analysis...

# Print the summary of tuned parameters
print(summary(tuned))

# Train the SVM model using the best found parameters
svm.model <- svm(StressLevel ~ ., data = train.data, type='C-classification', kernel = "radial", cost = tuned$best.parameter$cost, gamma = tuned$best.parameter$gamma)

# Print the model summary
print(summary(svm.model))

# Save the trained model for later use
save(svm.model, file = "stress_svm_model.RData")

# Make predictions on the test set
svm.pred <- predict(svm.model, test.data[,-which(names(test.data) == "StressLevel")])

# You can add code here to evaluate the model's performance, like calculating accuracy, etc.



######################################################################################################## for gen model accuracy 
# svm.model <- svm(StressLevel ~ ., data = train.data, type='C-classification', kernel = "radial")

# # Predict on the test set
# svm.pred <- predict(svm.model, test.data[, -which(names(test.data) == "StressLevel")])

# # Create the confusion matrix
# confusion.matrix <- table(Predicted = svm.pred, True = test.data$StressLevel)

# # Calculate the accuracy
# accuracy <- sum(diag(confusion.matrix)) / sum(confusion.matrix)

# # Print the confusion matrix and accuracy
# print(confusion.matrix)
# print(paste("Accuracy:", round(accuracy * 100, 2), "%"))