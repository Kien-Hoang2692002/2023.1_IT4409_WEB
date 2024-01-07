const express = require("express");
require("dotenv").config();
const mongoose = require("mongoose");

const blogRouter = require("./routes/BlogRoutes");

const app = express();

//middleware
app.use(express.json());

// app.get("/", (req, res) => {
//   res.send("Hello world!,");
// });

const PORT = process.env.PORT || 6969;

// router
app.use("/api/blogs", blogRouter);

//configure mongoose
mongoose
  .connect(
    process.env.MONGODB_URI ||
      "mongodb+srv://it4409:it4409-soict@lamdb-crud.qd3s7vv.mongodb.net/?retryWrites=true&w=majority"
  )
  .then(() => console.log("Connected!"));

app.listen(PORT, () => {
  console.log("Server is running on port:" + PORT);
});

module.exports = app;
