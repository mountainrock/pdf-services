package com.san.jshoutbox.web;

import java.util.Date;
import java.util.List;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.dao.QuestionAnswerDAO;
import com.san.jshoutbox.model.QuestionAnswer;
import com.san.jshoutbox.util.ValidateUser;

@Controller
public class QuestionBankController {

	@Autowired
	QuestionAnswerDAO questionAnswerDAO;

	@Autowired
	ValidateUser validateUser;

	@RequestMapping(value = { "/qa/admin" }, method = RequestMethod.GET)
	public ModelAndView show(@RequestParam(value="password",required=false) String password, HttpServletRequest request) {
		ModelAndView mv = new ModelAndView("questionbank/questionBank-admin");
		if (validateUser.validate(ValidateUser.USER_ADMIN, password,request.getSession(true))) {
			mv.addObject("qas", questionAnswerDAO.readAll(1,1000));
		} else {
			mv.addObject("message", "Invalid admin password");
		}
		return mv;
	}

	@RequestMapping(value = { "/qa/listJson" }, method = RequestMethod.GET)
	public  @ResponseBody List showAllJson(@RequestParam(value="password",required=false) String password,@RequestParam(value="page") int page, @RequestParam(value="size") int size, HttpServletRequest request, HttpServletResponse response) {
		setJsonHeaders(response);
		
		if (validateUser.validate(ValidateUser.USER_ADMIN, password,request.getSession(true))) {
			return questionAnswerDAO.readAll(page, size);
		} else {
			List l = new java.util.ArrayList<String>();
			l.add("Invalid password");
			return l;
		}
	}

	private void setJsonHeaders(HttpServletResponse response) {
		response.setContentType("application/json");
		response.setHeader("Access-Control-Allow-Origin", "*");
		response.setHeader("Access-Control-Allow-Methods", "GET, POST, OPTIONS");
		response.setHeader("Access-Control-Allow-Credentials", "true");
	}
	
	@RequestMapping(value = { "/qa/{id}" }, method = RequestMethod.GET)
	public ModelAndView read(@PathVariable("id") Long id) {
		ModelAndView mv = new ModelAndView("questionbank/questionAnswer");
		mv.addObject("qa", questionAnswerDAO.read(id));
		return mv;
	}
	
	@RequestMapping(value = { "/qajson/{id}.json" }, headers="Accept=*/*", method = RequestMethod.GET)
	public @ResponseBody QuestionAnswer readJson(@PathVariable("id") Long id, HttpServletResponse response) {
		setJsonHeaders(response);
		return questionAnswerDAO.read(id);
	}


	@RequestMapping(value = { "/qa/add" }, method = RequestMethod.POST)
	public ModelAndView add(QuestionAnswer questionBank) {

		questionBank.setRating(0);
		questionBank.setDate(new Date());
		questionAnswerDAO.create(questionBank);
		ModelAndView mv = new ModelAndView("redirect:/qa/admin");
		mv.addObject("message", "Added!!");
		return mv;
	}

	@RequestMapping(value = { "/qa/delete/{id}" }, method = RequestMethod.GET)
	public ModelAndView delete(@PathVariable("id") Long id, HttpServletResponse response) {

		ModelAndView mv = new ModelAndView("redirect:/qa/admin");
		questionAnswerDAO.delete(id);
		mv.addObject("message", "Deleted!!"+id);
		mv.addObject("password", validateUser.getPassword(ValidateUser.USER_ADMIN));
		return mv;
	}

	@RequestMapping(value = { "/qa/edit" }, method = RequestMethod.POST)
	public ModelAndView update(QuestionAnswer questionBank) {
		questionAnswerDAO.update(questionBank);
		ModelAndView mv = new ModelAndView("redirect:/qa/admin");
		mv.addObject("message", "Updated!!");
		mv.addObject("questionBanks", questionAnswerDAO.readAll(1,1000));
		return mv;
	}

	@RequestMapping(value = { "/qa/rate/{questionBankId}/{rating}" }, method = RequestMethod.GET)
	public ModelAndView updateRating(@PathVariable("rating") int rating, @PathVariable("questionBankId") long questionBankId, HttpServletRequest request) {
		QuestionAnswer questionBank = new QuestionAnswer();
		questionBank.setId(questionBankId);
		questionBank.setRating(rating);
		questionAnswerDAO.updateRated(questionBank, request.getRemoteHost());
		ModelAndView mv = new ModelAndView("redirect:/qa/" + questionBankId);
		return mv;
	}
}
